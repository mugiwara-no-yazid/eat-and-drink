@extends('admin.home')

@section('content')
    <h2 class="title">Demandes en attentes</h2>

    @if(!$waiting || sizeof($waiting) === 0)
        <div class="bord-10 card empty flex justify-c w-100 box-s text-c" style="padding:50px;">
            <div>
                <div class="flex justify-c p-10 m-10" style="margin:20px auto;"><i data-lucide="users" transform="scale(2)"></i></div>
                <strong>Aucune demande en attente</strong>
                <p class="m-10">Toutes les demandes ont été traitées.</p>
            </div>
        </div>
    @endif


    @foreach($waiting as $elem)
            <div class="card stand-wait">
                <div class="flex bet">
                    <h3> {{ $elem['name_stand']}} </h3>
                    <p class="flag" style="transform: scale(0.8) translateX(10px);"> En attente </p>
                </div> 

                <div class="flex" style="margin:2px 0; gap: 0;">
                    <p class="flag" style=" transform: scale(0.7) translateX(-20px);"> {{ $elem['category']}} </p>
                    <p class="flex align-c" style="gap:3px;"> <i data-lucide="calendar" transform="scale(0.8)" stroke="gray"></i> {{ $elem['created_at'] }} </p>
                </div>

                <p class="description"> {{ $elem['description'] ?? 'Bienvenue chez nous'}} </p>
                
                <div class="flex bet">
                    <div class="flex"><i data-lucide="mail" stroke="gray" transform="scale(0.8)"></i> <p> {{ $elem['user']['email']}} </p></div>
                    <div class="flex"> <i data-lucide="phone" stroke="gray" transform="scale(0.8)"></i> <p> {{ $elem['user']['number']}} </p> </div>
                </div>

                <div class="flex justify-c" style="margin-top: 10px;">
                    <form action="{{ route('stand-approve', $elem['id']) }}" method="post" style="width: 50%;">
                        @csrf
                        <input type="hidden" name="action", value="accept">
                        <button type="submit" class="cursp button approve" style="width: 100%; background: linear-gradient(135deg, hsl(25 95% 60%), hsl(35 85% 65%))"> &check; Approuver </button>
                    </form>
                    <form action="{{ route('stand-reject', $elem['id']) }}" method="post" style="width: 50%;">
                        @csrf
                        <input type="hidden" name="action", value="reject">
                        <button type="submit" class="cursp button reject" style="width: 100%; background:rgba(220, 39, 36, 0.78);"> &cross; Rejeter </button>
                    </form>
                </div>
            </div>
        @endforeach

@endsection

@section('script')
    <script>
        document.querySelector('.wait').classList.add('card', 'box-s')
    </script>
@endsection