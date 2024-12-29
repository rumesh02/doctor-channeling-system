<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4 text-gray-800">You're logged in!</h3>

                <!-- Display User Role -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Your Role: <span class="text-blue-600 font-bold">{{ $role ? $role->name : 'No role assigned' }}</span>
                    </h3>
                </div>

                <!-- Available Doctors -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">Available Doctors</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($doctors as $doctor)
                            <div class="p-4 border rounded-lg shadow-md bg-blue-50">
                                <p class="font-bold text-gray-700">{{ $doctor->name }}</p>
                                <p class="text-sm text-gray-600">{{ $doctor->specialization }}</p>
                                <form method="POST" action="{{ route('doctors.channel', $doctor->id) }}" class="mt-2">
                                    @csrf
                                    <button 
                                        type="submit" 
                                        class="px-4 py-2 bg-blue-500 text-black font-bold border border-blue-700 rounded-md hover:bg-blue-600 hover:border-blue-800">
                                        Channel
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Channeled Doctors -->
                <div>
                    <h3 class="text-xl font-semibold text-green-600 mb-3">Channeled Doctors</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($channeledDoctors as $channeled)
                            <div class="p-4 border rounded-lg shadow-md bg-green-50">
                                <p class="font-bold text-gray-700">{{ $channeled->doctor->name }}</p>
                                <p class="text-sm text-gray-600">{{ $channeled->doctor->specialization }}</p>
                                <form method="POST" action="{{ route('channeled.delete', $channeled->id) }}" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="px-4 py-2 bg-red-500 text-black font-bold border border-red-700 rounded-md hover:bg-red-600 hover:border-red-800">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
