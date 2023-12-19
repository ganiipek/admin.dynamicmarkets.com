<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Crypto Transfer Check</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Token</label>
                                            <input id="input_tokens" name="input_tokens" list="datalist_tokens"
                                                class="form-control">
                                            <datalist id="datalist_tokens">
                                                @foreach($available_tokens as $available_token)
                                                <option id="{!! $available_token->tokenId !!}" value="[{!!
                                                    $available_token->currency !!}] {!! $available_token->name !!} ({!!
                                                    $available_token->symbol !!})"
                                                    data-token-id="{!! $available_token->tokenId !!}"
                                                    data-token-symbol="{!! $available_token->symbol !!}"
                                                    data-token-currency="{!! $available_token->currency !!}"
                                                    data-token-name="{!! $available_token->name !!}"></option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">TX Direction</label>
                                            <select id="input_tx_direction" name="input_tx_direction"
                                                class="form-control" id="inlineFormCustomSelect">
                                                <option selected value="withdrawal">Withdrawal</option>
                                                <option value="deposit">Deposit</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Transaction Hash</label>
                                            <input id="input_transaction_hash" name="input_transaction_hash" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Target Address</label>
                                            <input id="input_target_address" name="input_target_address" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <button id="checkCryptoTXButton" type="button"
                                                class="btn btn-primary">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <pre id="response_json"></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(function() {
            $('body').on('click', 'button[id=checkCryptoTXButton]', function(e) {
                $("#checkCryptoTXButton").prop("disabled", true);

                const selected_token = $("input[id=input_tokens]").val();
                let token_id = $('#datalist_tokens option').filter(function() {
                    return this.value == selected_token;
                }).data('token-id');
                let token_currency = $('#datalist_tokens option').filter(function() {
                    return this.value == selected_token;
                }).data('token-currency');
                let tx_direction = $("select[id=input_tx_direction]").val();
                let transaction_hash = $("input[id=input_transaction_hash]").val();
                let target_address = $("input[id=input_target_address]").val();

                console.log("token_id", token_id)
                console.log("token_currency", token_currency)
                console.log("tx_direction", tx_direction)
                console.log("transaction_hash", transaction_hash)
                console.log("target_address", target_address)

                if (token_id == undefined || token_currency == undefined) {
                    toastr.error("Please select token", 'Error')
                    $("#checkCryptoTXButton").prop("disabled", false);
                    return;
                }

                if (tx_direction == "" || transaction_hash == "" || target_address == "") {
                    toastr.error("Please fill all fields", 'Error')
                    $("#checkCryptoTXButton").prop("disabled", false);
                    return;
                }


                $.ajax({
                    type: "get",
                    url: '{{ action("App\\Http\\Controllers\\SumsubController@checkCryptoStandaloneAnalysis") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        token_id: token_id,
                        token_currency: token_currency,
                        tx_direction: tx_direction,
                        transaction_hash: transaction_hash,
                        target_address: target_address
                    },
                    success: function(response) {
                        console.log(response.data)
                        document.getElementById("response_json").innerHTML = JSON.stringify(response.data, undefined, 2);
                        toastr.success("Checked", 'Success')
                        $("#checkCryptoTXButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#checkCryptoTXButton").prop("disabled", false);
                    }
                });
            })
        });
        // $("#checkCryptoTXForm").validate({
        //     errorClass: 'is-invalid',
        //     rules: {
        //         input_tokens: {
        //             required: true
        //         },
        //         input_tx_direction: {
        //             required: true
        //         },
        //         input_transaction_hash: {
        //             required: true
        //         },
        //         input_target_address: {
        //             required: true
        //         }
        //     },
        //     messages: {
        //         // input_first_name: {
        //         //     required: "Turnuva adı boş bırakılamaz."
        //         // }
        //     },
        //     submitHandler: function(form) {
        //         $("#checkCryptoTXButton").prop("disabled", true);

        //         let token_id = form.input_tokens.selectedOptions[0].token_id
        //         let token_currency = form.input_tokens.selectedOptions[0].token_currency
        //         let tx_direction = form.input_tx_direction.selectedOptions[0].value
        //         let transaction_hash = form.input_transaction_hash.value
        //         let target_address = form.input_target_address.value

        //         $.ajax({
        //             type: "post",
        //             url: '{{ action("App\\Http\\Controllers\\SumsubController@checkCryptoStandaloneAnalysis") }}',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 token_id: token_id,
        //                 token_currency: token_currency,
        //                 tx_direction: tx_direction,
        //                 transaction_hash: transaction_hash,
        //                 target_address: target_address
        //             },
        //             success: function(response) {
        //                 // toastr.success("Customer created successfully");
        //                 $("#checkCryptoTXButton").prop("disabled", false);
        //             },
        //             error: function(error) {
        //                 console.log(error)
        //                 toastr.error(error.responseJSON.message);
        //                 $("#checkCryptoTXButton").prop("disabled", false);
        //             }
        //         });
        //     }
        // });
        </script>
    </x-slot>
</x-app-layout>