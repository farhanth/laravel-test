<x-slot name="header">
	<h2>GitHub Jobs</h2>
</x-slot>

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
	@foreach ($responseBody as $response)
	<a href="position/{{ $response->id }}" class="hover:cursor-pointer hover:border-4 hover:border-gray-400 hover:bg-gray-200 transition duration-300 ease-in-out rounded overflow-hidden shadow-lg border-2">
		<div class="bg-white hover:bg-gray300">
			<img class="object-contain h-60 w-full" src="{{ $response->company_logo }}" alt="Company Logo">
			<div class="px-6 py-4">
				<div class="font-bold text-black text-xl mb-2">{{ $response->company }}</div>
				<p class="text-gray-700 text-base">
					{{ $response->title }}.
				</p>
			</div>
			<div class="px-6 pt-4 pb-2">
				<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $response->location }}</span>
				<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $response->type }}</span>
			</div>
		</div>
	</a>
	@endforeach
</div>
<div class="mt-8 mb-5 mx-7">
	{{ $responseBody->links() }}
</div>