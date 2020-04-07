@extends('layouts.theme')

@section('content')

    <div class="home-hero-section">



        <div class="job-search-bar">

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>We are Hire the best Tagline Freelancers </h1>
                        <p class="mt-4 mb-4 job-search-sub-text">Find top Tagline Freelancers on Freelancing Web — the leading freelancing website for short-term, recurring, and full-time Tagline contract work. <br /> </p>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">

                        <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                            <div class="form-row">
                                <div class="col-auto">
                                    <input type="text" name="q" class="form-control mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
                                    <input type="text" name="location" class="form-control" style="min-width: 300px;"  placeholder="@lang('app.job_location_placeholder')">
                                    <button type="submit" class="btn btn-success mb-2"><i class="la la-search"></i> @lang('app.search') @lang('app.job')</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>


    @if($categories->count())
        <div class="home-categories-wrap bg-white pb-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">@lang('app.browse_category')</h4>
                    </div>
                </div>

                <div class="row">

                    @foreach($categories as $category)
                        <div class="col-md-4">

                            <p>
                                <a href="{{route('jobs_listing', ['category' => $category->id])}}" class="category-link"><i class="la la-th-large"></i> {{$category->category_name}} <span class="text-muted">({{$category->job_count}})</span> </a>
                            </p>

                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    @endif



    @if($premium_jobs->count())
        <div class="premium-jobs-wrap pb-5 pt-5">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">@lang('app.premium_jobs')</h4>
                    </div>
                </div>

                <div class="row">
                    @foreach($premium_jobs as $job)
                        <div class="col-md-4 mb-3">
                            <div class="premium-job-box p-3 bg-white box-shadow">

                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="premium-job-logo">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}">
                                                <img src="{{$job->employer->logo_url}}" class="img-fluid" />
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-6">

                                        <p class="job-title">
                                            <a href="{{route('job_view', $job->job_slug)}}">{!! $job->job_title !!}</a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}" class="text-muted">
                                                {{$job->employer->company}}
                                            </a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <i class="la la-map-marker"></i>
                                            @if($job->city_name)
                                                {!! $job->city_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->state_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->country_name !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>
    @endif



    <div class="new-registration-page bg-white pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.job_seeker')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/employee.png')}}" /></p>
                        <p>@lang('app.job_seeker_new_desc')</p>
                        <a href="{{route('register_job_seeker')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.employer')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/enterprise.png')}}" /></p>
                        <p>@lang('app.employer_new_desc')</p>
                        <a href="{{route('register_employer')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.agency')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/agent.png')}}" /></p>
                        <p>@lang('app.agency_new_desc')</p>
                        <a href="{{route('register_agent')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($regular_jobs->count())
        <div class="regular-jobs-wrap pb-5 pt-5">

            <div class="container">
                <div class="regular-job-container p-3">

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-3">@lang('app.new_jobs')</h4>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($regular_jobs as $regular_job)
                            <div class="col-md-4 mb-3">

                                <div class="row">
                                    <div class="col-md-12">

                                        <p class="job-title m-0">
                                            <a href="{{route('job_view', $regular_job->job_slug)}}">{!! $regular_job->job_title !!}</a>
                                        </p>

                                        <p class="text-muted  m-0">
                                            <i class="la la-map-marker"></i>
                                            @if($regular_job->city_name)
                                                {!! $regular_job->city_name !!},
                                            @endif
                                            @if($regular_job->state_name)
                                                {!! $regular_job->state_name !!},
                                            @endif
                                            @if($regular_job->state_name)
                                                {!! $regular_job->country_name !!}
                                            @endif
                                        </p>

                                    </div>
                                </div>

                            </div>

                        @endforeach

                    </div>


                </div>

            </div>


        </div>
    @endif



    <div class="new-registration-page bg-white pb-5 pt-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="call-to-action-post-job justify-content-center">
                        <div class="job-post-icon my-auto">
                            <img src="{{asset('assets/images/job.png')}}" />
                        </div>
                        <div class="job-post-details mr-3 ml-3 p-3 my-auto">
                            <h1>Post your job</h1>
                            <p>
                                Job seekers looking for quality job always. <br /> Post your job to get the talents
                            </p>
                        </div>

                        <div class="job-post-button my-auto">
                            <a href="{{route('post_new_job')}}" class="btn btn-success btn-lg">Post a Job</a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="job-stats-footer pb-5 pt-5 text-center">
        <div class="container">


            
        </div>
    </div>


@endsection
