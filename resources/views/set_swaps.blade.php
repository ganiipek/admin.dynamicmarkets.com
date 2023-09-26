<x-app-layout>
	<x-slot name="slot">
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<!-- Row -->
				<div class="row">
					<div class="col-xl-12 wow fadeInUp" data-wow-delay="1.00s">

						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Set Swaps</h4>
							</div>
							<div class="card-body">
								<div class="mb-3">
									<label for="formFile" class="form-label">Upload only CSV</label>
									<input class="form-control" onclick="this.value=null" accept=".csv" type="file" id="fileInput">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 wow fadeInUp" data-wow-delay="1.00s">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Swap List</h4>
								<h6>If text is left aligned it means swap of related symbol will changed!<p>Upload CSV and check the new swap values.</p>
								</h6>
							</div>
							<div class="card-body">
								<!-- ----column-- -->
								<div class="table-responsive  patient">
									<table class="table-responsive-lg table display mb-4 dataTablesCard  text-black dataTable no-footer" id="example6">
										<thead>

											<tr>
												<th>Symbol</th>
												<th>Previous Long Swap</th>
												<th>New Long Swap</th>
												<th>Previous Short Swap</th>
												<th>New Short Swap</th>
											</tr>
										</thead>
										<tbody>
											@foreach($initial_swaps["swaps"] as $key => $client)
											<tr id="{{$key}}">
												<td>{{$key}}</td>
												<td id="{{$key}}_pre_long" class="whitesp-no fs-14 font-w400">
													<center>{{$client["long_swap"]}}</center>
												</td>
												<td id="{{$key}}_new_long" class="whitesp-no fs-14 font-w400">
													<center>{{$client["long_swap"]}}</center>
												</td>
												<td id="{{$key}}_pre_short" class="whitesp-no fs-14 font-w400">
													<center>{{$client["short_swap"]}}</center>
												</td>
												<td id="{{$key}}_new_short" class="whitesp-no fs-14 font-w400">
													<center>{{$client["short_swap"]}}</center>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-danger w-100 mt-3">Cancel</button>
								<button id="confirm_swaps" class="btn btn-success w-100 mt-3">Confirm</button>
							</div>
						</div>
						<!-- ----/column-- -->
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- Required vendors -->
		<script src="{{ asset('vendor/global/global.min.js')}}"></script>
		<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
		<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
		<!-- -----datatables-- -->
		<script src="{{ asset('./vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{ asset('./js/plugins-init/datatables.init.js')}}"></script>

		<!-- Apex Chart -->
		<script src="{{ asset('vendor/apexchart/apexchart.js')}}"></script>
		<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

		<!-- Chart piety plugin files -->
		<script src="{{ asset('vendor/peity/jquery.peity.min.js')}}"></script>

		<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

		<!-- ----swiper-slider---- -->
		<script src="{{ asset('./vendor/swiper/js/swiper-bundle.min.js')}}"></script>
		<!-- Dashboard 1 -->

		<script src="{{ asset('vendor/wow-master/dist/wow.min.js')}}"></script>

		<script src="{{ asset('js/dlabnav-init.js')}}"></script>
		<script src="{{ asset('js/custom.min.js')}}"></script>
		<script src="{{ asset('js/demo.js')}}"></script>
		<script src="{{ asset('js/styleSwitcher.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/d3@7"></script>
		<script>
			const myForm = document.getElementById("fileInput");
			var global_csv_json = null;
			myForm.addEventListener("change", async function(e) {
				e.preventDefault();
				const input = myForm.files[0];
				const reader = new FileReader();
				var json_ = null
				reader.onload = async function(e) {
					const text = e.target.result;
					const data = d3.csvParse(text);
					const json = await JSON.stringify(data);
					await setSwaps(json)
				};

				await reader.readAsText(input);
			});

			const confirmButton = document.getElementById("confirm_swaps");
			confirmButton.addEventListener("click", async function(e) {
				e.preventDefault();
				console.log(global_csv_json);
			});

			async function setSwaps(json) {
				var symbols = []
				var long_swap = []
				var short_swap = []
				json = JSON.parse(json)
				var json_string = "{"
				for (i = 0; i < json.length; i++) {
					if (i == json.length - 1) {
						json_string = json_string + '"' + json[i]["symbol;long_swap;short_swap"].split(";")[0] + '": { "long_swap":' + json[i]["symbol;long_swap;short_swap"].split(";")[1] + ', "short_swap":' + json[i]["symbol;long_swap;short_swap"].split(";")[2] + '}'
					} else {
						json_string = json_string + '"' + json[i]["symbol;long_swap;short_swap"].split(";")[0] + '": { "long_swap":' + json[i]["symbol;long_swap;short_swap"].split(";")[1] + ', "short_swap":' + json[i]["symbol;long_swap;short_swap"].split(";")[2] + '},'
					}
				}
				json_string = json_string + "}"
				json_string = JSON.parse(json_string)
				global_csv_json = json_string;
				for (row in json_string) {
					console.log(row)
					console.log(json_string[row].long_swap)
					console.log(json_string[row].short_swap)
					const findRowData_newLong = document.getElementById(row + "_new_long");
					const findRowData_newShort = document.getElementById(row + "_new_short");
					findRowData_newLong.innerHTML = parseFloat(json_string[row].long_swap);
					findRowData_newShort.innerHTML = parseFloat(json_string[row].short_swap);


				}

			}
		</script>

	</x-slot>
</x-app-layout>