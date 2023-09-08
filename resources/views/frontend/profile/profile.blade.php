@extends('frontend.includes.app')
@section('title', 'Profile')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                <h2 class="mb-3 me-auto">Profile</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('dashboard') }}">Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{{ asset('user-assets/xhtml/images/profile/profile.png') }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                        <p></p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                        <p>Email</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="profile-statistics">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="m-b-0">150</h3><span>Follower</span>
                                                </div>
                                                <div class="col">
                                                    <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                                </div>
                                                <div class="col">
                                                    <h3 class="m-b-0">45</h3><span>Reviews</span>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a>
                                                <a href="javascript:void(0);" class="btn btn-primary mb-1"
                                                    data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send
                                                    Message</a>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="sendMessageModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Send Message</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="comment-form">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Name
                                                                            <span class="required">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            value="Author" name="Author"
                                                                            placeholder="Author">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Email
                                                                            <span class="required">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            value="Email" placeholder="Email"
                                                                            name="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="text-black font-w600 form-label">Comment</label>
                                                                        <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <input type="submit" value="Post Comment"
                                                                            class="submit btn btn-primary" name="submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-blog">
                                        <h5 class="text-primary d-inline">Today Highlights</h5>
                                        <img src="images/profile/1.jpg" alt="" class="img-fluid mt-4 mb-4 w-100">
                                        <h4><a href="#" class="text-black">Darwin Creative Agency
                                                Theme</a></h4>
                                        <p class="mb-0">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which roasted
                                            parts of sentences fly into your mouth.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-interest">
                                        <h5 class="text-primary d-inline">Interest</h5>
                                        <div class="row mt-4 sp4" id="lightgallery">
                                            <a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg"
                                                data-src="images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                            </a>
                                            <a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg"
                                                data-src="images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                            </a>
                                            <a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg"
                                                data-src="images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                            </a>
                                            <a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg"
                                                data-src="images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                            </a>
                                            <a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg"
                                                data-src="images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                            </a>
                                            <a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg"
                                                data-src="images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-news">
                                        <h5 class="text-primary d-inline">Our Latest News</h5>
                                        <div class="media pt-3 pb-3">
                                            <img src="images/profile/5.jpg" alt="image" class="me-3 rounded"
                                                width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a href="#" class="text-black">Collection of
                                                        textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="images/profile/6.jpg" alt="image" class="me-3 rounded"
                                                width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a href="#" class="text-black">Collection of
                                                        textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="images/profile/7.jpg" alt="image" class="me-3 rounded"
                                                width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a href="#" class="text-black">Collection of
                                                        textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                class="nav-link active show">Profile Information</a>
                                        </li>
                                        <li class="nav-item"><a href="#reset-password" data-bs-toggle="tab"
                                                class="nav-link">Reset Password</a>
                                        </li>
                                        <li class="nav-item"><a href="#delete-account" data-bs-toggle="tab"
                                                class="nav-link ">Delete Account</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="delete-account" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <section class="space-y-6">
                                                    {{-- <header>
                                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                            {{ __('Delete Account') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                                                        </p>
                                                    </header> --}}

                                                    {{-- <x-danger-button class="btn btn-danger" x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button> --}}
                                                    <form method="post" action="{{ route('profile.destroy') }}"
                                                        class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                            {{ __('Are you sure you want to delete your account?') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                        </p>

                                                        <div class="mt-6">
                                                            <x-input-label for="password" value="{{ __('Password') }}"
                                                                class="sr-only" />

                                                            <x-text-input id="password" name="password" type="password"
                                                                class="form-control mt-1 block w-3/4"
                                                                placeholder="{{ __('Password') }}" />

                                                            <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger mt-2" />
                                                        </div>

                                                        <div class="mt-6 flex justify-end">
                                                            {{-- <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button> --}}

                                                            <x-danger-button class="btn btn-danger ml-3 mt-2">
                                                                {{ __('Delete Account') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>


                                                    </x-modal>
                                                </section>

                                            </div>
                                        </div>
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4"></h4>
                                                <form id="send-verification" method="post"
                                                    action="{{ route('verification.send') }}">
                                                    @csrf
                                                </form>

                                                <form method="post" action="{{ route('profile.update') }}"
                                                    class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('patch')

                                                    <div>
                                                        <x-input-label for="name" :value="__('Name')" />
                                                        <x-text-input id="name" name="name" type="text"
                                                            class="mt-1 block w-full form-control" :value="old('name', $user->name)"
                                                            required autofocus autocomplete="name" />
                                                        <x-input-error class="mt-2 form-control" :messages="$errors->get('name')" />
                                                    </div>

                                                    <div class="mt-3">
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" name="email" type="email"
                                                            class="form-control mt-1 block w-full" :value="old('email', $user->email)"
                                                            required autocomplete="username" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                            <div>
                                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                                    {{ __('Your email address is unverified.') }}

                                                                    <button form="send-verification"
                                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                                        {{ __('Click here to re-send the verification email.') }}
                                                                    </button>
                                                                </p>

                                                                @if (session('status') === 'verification-link-sent')
                                                                    <p
                                                                        class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="flex items-center gap-4">
                                                        <x-primary-button
                                                            class="mt-5 btn btn-secondary">{{ __('Save') }}</x-primary-button>

                                                        @if (session('status') === 'profile-updated')
                                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('Saved.') }}</p>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="reset-password" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary"></h4>
                                                    <form method="post" action="{{ route('password.update') }}"
                                                        class="mt-6 space-y-6">
                                                        @csrf
                                                        @method('put')

                                                        <div>
                                                            <x-input-label for="current_password" :value="__('Current Password')" />
                                                            <x-text-input id="current_password" name="current_password"
                                                                type="password" class="form-control mt-1 block w-full"
                                                                autocomplete="current-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-3">
                                                            <x-input-label for="password" :value="__('New Password')" />
                                                            <x-text-input id="password" name="password" type="password"
                                                                class="form-control mt-1 block w-full"
                                                                autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-3">
                                                            <x-input-label for="password_confirmation"
                                                                :value="__('Confirm Password')" />
                                                            <x-text-input id="password_confirmation"
                                                                name="password_confirmation" type="password"
                                                                class="form-control mt-1 block w-full"
                                                                autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get(
                                                                'password_confirmation',
                                                            )" class="mt-2" />
                                                        </div>

                                                        <div class="flex items-center gap-4 mt-5">
                                                            <x-primary-button
                                                                class="btn btn-primary">{{ __('Save') }}</x-primary-button>

                                                            @if (session('status') === 'password-updated')
                                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                                    x-init="setTimeout(() => show = false, 2000)"
                                                                    class="text-sm text-gray-600 dark:text-gray-400">
                                                                    {{ __('Saved.') }}</p>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
