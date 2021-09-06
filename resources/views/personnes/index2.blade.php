@extends('layouts.app')

@section('content')
            <div class="text">
                <p style="text-align: center; font-size:2vw;">Saisir le code Alphanumérique présentée dans le champ code Alphanumérique pour vérifier si la personne est dans la base.</p>
            </div>
            <div class="text">
                <p style="text-align: center; font-size:2vw;">Enter the Alphanumeric code presented in the Alphanumeric code field to check if the person is in the base.</p>
            </div>
            <form action="{{ route('index') }}" method="GET">
                @csrf
                <div class="form-left">
                    <div class="in">
                        <label for=""><h5>Code Alphanumérique</h5></label>
                        <input type="text" name="search" id="search-it" value="">
                    </div>
                    <div class="in">
                        <button type="submit">Vérification</button>
                    </div>
            </div>


        </form>
        <div id="eror">
            <table>
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Code Alphanumérique</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nothing</td>
                        <td>Nothing</td>
                        <td>Nothing</td>
                        <td>Nothing</td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection




