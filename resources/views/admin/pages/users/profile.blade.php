@section('title', __('User Profile'))

<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="h4 font-weight-bold">
                    {{ __('User Profile') }}
                </h2>
            </div>
            <div class="col-sm-6">
                {{ Breadcrumbs::render('usersProfile') }}
            </div>
        </div>
    </x-slot>

    <div id="app" class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            @include('admin.pages.users._partials.resume_profile')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">{{__('My data')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">{{__("My addresses")}}</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            @include('admin.pages.users._partials.form', [
                                'user' => $user
                            ])
                        </div>

                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            {{-- @include('admin.pages.users._partials.timeline') --}}
                            <addresses-user></addresses-user>
                        </div>

                        <div class="tab-pane" id="activity">
                            {{-- @include('admin.pages.users._partials.posts') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
