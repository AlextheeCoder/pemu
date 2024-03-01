<x-adminlayout>
    <h1 class="title">Admin Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>{{ $farmersCount }}</h2>
							<p>Farmers</p>
						</div>
						
						@if($farmersCount > 0)
							<i class='bx bx-trending-up icon' ></i>
							@else
							<i class='bx bx-trending-down icon down' ></i>
						@endif
						
					
					</div>
					<span class="progress" data-value="{{$farmersIncrease}}%"></span>
					<span class="label">{{$farmersIncrease}}%  From yesterday</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>{{ $providersCount }}</h2>
							<p>Providers</p>
						</div>
						
						@if($providersCount > 0)
							<i class='bx bx-trending-up icon' ></i>
							@else
							<i class='bx bx-trending-down icon down' ></i>
						@endif
						
					</div>
					<span class="progress" data-value="{{$providersIncrease}}%"></span>
					<span class="label">{{$providersIncrease}}%  From yesterday</span>
					

				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>0</h2>
							<p>Visitors Today</p>
						</div>
						
						
							<i class='bx bx-trending-up icon' ></i>
					
					
					
					</div>
					<span class="progress" data-value="8%"></span>
					<span class="label">8%  From yesterday</span>
				</div>
				
			</div>
</x-adminlayout>