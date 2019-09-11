@extends('_views.guest.layout', ['title'=>'Home'])

@section('body')
<style>
    section#SectionHero {
        padding: 40px;
        background: #efe;
    }

    section#SectionHero h1 {
        padding: 40px;
        color: #333;
    }

    section#SectionEnroll {
        padding: 40px;
        background: white;
    }
</style>
<section id="SectionHero">
    <div class="container">
        <h1>
            Build Serverless Apps with Deno
        </h1>
    </div>
</section>
<section id="SectionEnroll">
    <div class="container">
        <p>
            <a href="https://forms.gle/uRJgBQ9b3sbZihzM8" target="_blank" class="btn btn-lg btn-warning">
                Express interest to be informed when the service starts
            </a>
        </p>
    </div>
</section>
@endsection