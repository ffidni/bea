<div class="flex flex-wrap mt-5 gap-5 justify-center {{isset($center) && $center ? '' : 'md:justify-normal'}}">
    @foreach ($jenisBeasiswa as $beasiswa)
        @include('components.beasiswa.card', $beasiswa)
    @endforeach
</div>