<x-app-layout>
    @include('layouts.navigation')
    <div class="container-profile">
        @include('layouts.sidebar')
        {{-- profile --}}
        <div>
            <div class="container-profil">
                <div class="flex p-4 sm:p-8 bg-[#8B5E3C] shadow sm:rounded-lg justify-between">
                    <div class="w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-[#8B5E3C] shadow sm:rounded-lg">
                    <div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-[#8B5E3C] shadow sm:rounded-lg">
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profilePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    
</x-app-layout>
