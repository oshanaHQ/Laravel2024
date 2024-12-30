@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Profile Settings</h1>

        <div class="bg-white shadow rounded-lg p-6 space-y-6">
            <!-- Profile Information Form -->
            <div>
                <h2 class="text-lg font-medium mb-4">Profile Information</h2>
                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Update Profile
                    </button>
                </form>
            </div>

            <!-- Delete Account Form -->
            <div class="pt-6 border-t">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Delete Account</h2>
                <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                    @csrf
                    @method('DELETE')
                    
                    <p class="text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                    </p>

                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection