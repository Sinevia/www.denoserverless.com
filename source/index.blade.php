@extends('_views.guest.layout', ['title'=>'Home'])

@section('body')
<div class="page-inddex">
    <style>
        section#SectionHero {
            padding: 40px;
            background: #efe;
        }

        section#SectionHero h1 {
            padding: 40px 0px;
            color: #333;
        }

        section#SectionEnroll {
            padding: 40px;
            background: white;
            color: silver;
        }

        section#SectionResourcesLatest {
            padding: 40px;
        }

        section#SectionResourcesLatest ul {
            padding: 0px;
        }

        section#SectionResourcesLatest li {
            margin: 5px;
            padding: 10px;
            border-bottom: 1px dotted silver;
        }
    </style>
    <!-- START: Section Hero -->
    <section id="SectionHero">
        <div class="container">
            <h1>
                Build Serverless Apps with Deno. With Ease.
            </h1>
        </div>
    </section>
    <!-- END: Section Hero -->

    <!-- START: Section Enroll -->
    <section id="SectionEnroll">
        <div class="container">
            <p>
                This service is still in development.
                To get notified once its ready sign up below.
            </p>
            <p>
                <a href="https://forms.gle/uRJgBQ9b3sbZihzM8" target="_blank" class="btn btn-lg btn-warning">
                    Express interest to be informed when the service starts
                </a>
            </p>
        </div>
    </section>
    <!-- END: Section Enroll -->

    <!-- START: Section Latest Resources -->
    <section id="SectionResourcesLatest">
        <?php
        //$latestResources = array_multisort(array_column($resources, "id"), SORT_DESC, $resources);
        //$latestResources = array_slice($latestResources, 0, 5);
        //$latestResources = array_multisort(array_map(function ($e) {
        //    return $e->id;
        //}, $resources), SORT_DESC, $resources);
        $latestResources = $resources->sortBy('id')->reverse()->slice(0, 5)->all();
        ?>
        <div class="container">
            <h2>
                Latest Deno Resources
            </h2>
            <ul>
                <?php foreach ($latestResources as $resource) { ?>
                    <li>
                        <a href="/resources/resource/{{ $resource->id }}">
                            {{$resource->title}} ({{$resource->type}})
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <a href="/resources">
                view all resources
            </a>
        </div>
    </section>
    <!-- END: Section Latest Resources -->
</div>
@endsection