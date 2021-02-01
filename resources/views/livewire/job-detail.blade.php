<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">

	@livewireStyles

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
	<x-jet-banner />

	<div class="min-h-screen bg-gray-100">
		@livewire('navigation-menu')

		<!-- Page Heading -->
		@if (isset($header))
		<header class="bg-white shadow">
			<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
				{{ $header }}
			</div>
		</header>
		@endif

		<!-- Page Content -->
		<main>
			<x-slot name="header">
				<h2 class="text-white-500">GitHub Jobs</h2>
			</x-slot>

			<div class="col-start-1 col-end-3 mt-10 mb-4 mx-20 w-1/4">
				<a href="{{ route('list') }}">
					<div
						class="h-full p-6 dark:bg-gray-800 bg-white hover:shadow-xl rounded border-b-4 border-gray-200 shadow-md">
						<h3 class="text-2xl font-semibold inline-flex my-0">
							<svg class="mr-2" width="24" height="30" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M1.02698 11.9929L5.26242 16.2426L6.67902 14.8308L4.85766 13.0033L22.9731 13.0012L22.9728 11.0012L4.85309 11.0033L6.6886 9.17398L5.27677 7.75739L1.02698 11.9929Z"
									fill="currentColor" /></svg>
							Prev
						</h3>
						<p class="text-lg my-0">Not Interested? Find more</p>
					</div>
				</a>
			</div>

			<div class="flex justify-center items-center my-10 mx-20">
				<div class="w-full flex flex-col bg-white shadow-lg rounded-lg overflow-hidden">
					<div class="bg-gray-200 text-black-700 text-2xl px-6 py-4">{{ $responseBody->company }}</div>

					<div class="flex items-center px-6 py-4">
						<img class="object-contain h-60 w-full" src="{{ $responseBody->company_logo }}" alt="Mountain">
					</div>

					<div class="flex justify-between items-center px-6 pt-4">
						<div class="text-black-700 text-xl px-6 pt-4">{{ $responseBody->title }}</div>
						<div class="text-base">{{ $responseBody->created_at }}</div>
					</div>

					<div class="flex px-6 pb-4">
						<div class="text-gray-700 text-sm px-6 pb-4">{{ $responseBody->location }} / {{ $responseBody->type }}</div>
					</div>

					<div class="px-6 py-4 border-t border-gray-200">
						<h6>Description :</h6>
						<div class="border rounded-lg p-4 bg-gray-200">
							{!! $responseBody->description !!}
						</div>
					</div>
				</div>
			</div>

			<div class="flex justify-center items-center my-10 mx-20">
				<div class="w-full flex flex-col bg-white shadow-lg rounded-lg overflow-hidden">
					<div class="bg-gray-200 text-black-700 text-2xl px-6 py-4">How to Apply</div>

					<div class="px-6 py-4">
						{!! $responseBody->how_to_apply !!}
					</div>
				</div>
			</div>
		</main>
	</div>

	@stack('modals')

	@livewireScripts
</body>
</html>