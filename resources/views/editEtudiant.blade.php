@extends('layouts.app')
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 text-center ">Edition d'un nouvel etudiant</h3>
    <div class="mt-4">

        @if(session()->has("success"))
        <div class="alert alert-success">
            <h4>{{session()->get('success')}}</h4>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger form-control">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form style="width:100%;" class="mb-4" action="{{route('etudiant.update',['etudiant'=>$etudiant->id])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="mt-4">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de l'etudiant</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$etudiant->nom}}">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom de l'etudiant</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value={{$etudiant->prenom}}>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Classe</label>
                    <select class="form-control" name="classe_id">
                        <option value=""></option>
                        @foreach ($classes as $classe)
                            @if($classe->id == $etudiant->classe_id)
                        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                            @else
                        <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
