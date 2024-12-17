<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{__('Список заявлений')}}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class='flex justify-between bg-blue-700 text-white font-bold text-xl'>
        <p class="p-5  w-full max-[450px]:p-2">Дата заявления</p>
        <p class="p-5  w-full max-[450px]:p-2 max-[800px]:hidden">Номер </p>
        <p class="p-5 w-full max-[450px]:p-2">Имя пользователя</p>
        <p class="p-5 w-full max-[450px]:p-2 max-[800px]:hidden">Текст заявления</p>
        <p class="p-5 w-full max-[450px]:p-2">Статус</p>
      </div>
      @foreach($requests as $request)
      <div class='flex justify-between'>
      <p class=" w-full p-5">{{\Carbon\Carbon::parse($request->created_at)->translatedFormat('j F Y')}}</p>
      <p class="  w-full p-5 max-[800px]:hidden">{{ $request->number }}</p>
      <p class=" w-full p-5">{{ $request->user->name }}</p>
      <p class=" w-full p-5">{{\Carbon\Carbon::parse($request->date)->translatedFormat('j F Y')}}</p>
      @if($request->status_id == 1)
      <form class=" w-full p-5" id="form-update-{{$request->id}}" action="{{route('request.update')}}" method="POST">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{$request->id}}">
      <select class=" w-full" name="status_id"
      onchange="document.getElementById('form-update-{{$request->id}}').submit()">
      @foreach ($statuses as $status)
      <option value="{{$status->id}}">{{$status->name}}</option>
    @endforeach
      </select>
      </form>
    @else
      <p class=" w-full p-5">{{ $request->status->name }}</p>
    @endif
      </div>
    @endforeach
    </div>
  </div>

</x-app-layout>