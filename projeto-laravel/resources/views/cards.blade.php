

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-card
                title="Card 1"
                description="Description for Card 1"
                link="{{ url('/link1') }}"
            />
            <x-card
                title="Card 2"
                description="Description for Card 2"
                link="{{ url('/link2') }}"
            />
            <x-card
                title="Card 3"
                description="Description for Card 3"
                link="{{ url('/link3') }}"
            />
        </div>
    </div>
@endsection
