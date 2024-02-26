<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'RDV')

@section('content')
    <h1>Welcome to my website!</h1>
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4" id="initial">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Prise de RDV VISA</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('demanderdv.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <select class="form-control" id="pays" name="pays_id">
                                <option value="">Sélectionner un pays</option>
                                @foreach ($pays as $pay)
                                    <option value="{{ $pay->id }}" data-icon="flag-icon flag-icon-fr">
                                        {{ $pay->libelle }}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group" id="type" style="display: none;">
                                <label for="type_visa">Type de Visa</label>
                                <select class="form-control" id="type_visa" name="type_visa_id">
                                    <option value="">Sélectionner un type de visa</option>
                                </select>
                            </div>
                            <div id="num_passport_field" style="display:none;">
                                <label for="num_passport">Numéro de passeport</label>
                                <input type="text" class="form-control" id="num_passport" name="num_passport">
                                <br>
                                <button type="button" class="btn btn-primary" id="check_rdv_button">suivant</button>
                            </div>
                            <div id="verification_message">

                            </div>


                        </div>
                        <!-- Ajoutez les autres champs du formulaire ici -->

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4" id="suite" style="display: none">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Prise de RDV VISA</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="tel">Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="tel" name="num_tel">
                    </div>
                    <div class="form-group">
                        <label for="date_rdv">Date de rendez-vous souhaitée</label>
                        <input type="date" class="form-control" id="date_rdv" name="date_rdv">
                    </div>
                    <input type="file" name="uploads[]" id="files" multiple>
                    {{-- <div id="fileInputsContainer">
                        <!-- Container pour les champs d'upload de fichiers -->
                        <div class="fileInputContainer">
                            <button class="attachButton btn-primary" onclick="addFileInput(event)"><i
                                    class="fas fa-paperclip"></i>Joindre un fichier</button>
                            <input type="file" name="uploads[]" class="fileInput" id="uploadFile" style="display:none">
                            <button class="deleteButton btn-danger" onclick="deleteFileInput(this)" style="display:none"><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary" id="soumission" style="display: none">Soumettre</button>
        </div>
        <br>

        </form>

    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function addFileInput(event) {
            event.preventDefault();
            var fileInputsContainer = document.getElementById('fileInputsContainer');

            // Créer un nouvel élément d'input pour le fichier
            var newFileInput = document.createElement('input');
            newFileInput.type = 'file';
            newFileInput.name = 'uploads[]';
            newFileInput.className = 'fileInput';

            // Créer un bouton de suppression
            var deleteButton = document.createElement('button');
            deleteButton.className = 'deleteButton btn-danger';
            deleteButton.textContent = '';
            deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> ';
            deleteButton.onclick = function() {
                deleteFileInput(this);
            };

            // Créer un nouveau conteneur pour le champ d'upload de fichier
            var newFileInputContainer = document.createElement('div');
            newFileInputContainer.className = 'fileInputContainer';
            newFileInputContainer.appendChild(newFileInput);
            newFileInputContainer.appendChild(deleteButton);

            // Ajouter le nouvel élément de conteneur au conteneur principal
            fileInputsContainer.appendChild(newFileInputContainer);
        }




        function deleteFileInput(button) {
            // Récupérer le conteneur parent du bouton de suppression
            var fileInputContainer = button.parentNode;

            // Supprimer le conteneur parent du champ d'upload de fichier
            fileInputContainer.parentNode.removeChild(fileInputContainer);
        }

        function showFileInput(event) {
            event.preventDefault(); // Empêcher la soumission du formulaire
            var deleteButton = document.querySelector('.deleteButton');

            // Vérifier l'état actuel du champ d'upload de fichier
            if (fileInput.style.display === 'none') {
                fileInput.style.display = 'block';
                deleteButton.style.display = 'inline-block';
            } else {
                fileInput.style.display = 'none';
                deleteButton.style.display = 'none';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#pays').change(function() {
                var paysId = $(this).val();
                document.getElementById('type').style.display = "block"
                if (paysId) {
                    $.ajax({
                        url: '/get-visa-types/' + paysId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#type_visa').empty();
                            $('#type_visa').append(
                                '<option hidden>Selectionnez le type de visa</option>');
                            $.each(data, function(key, value) {
                                $('#type_visa').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#type_visa').empty();
                }
            });
        });
    </script>
    <script>
        $('#type_visa').change(function() {
            var type_visa_id = $(this).val();
            var pays_id = $('#pays').val();
            if (type_visa_id) {
                $.ajax({
                    url: '/get-disponibilites/' + type_visa_id + '/' + pays_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {
                            alert('Aucune disponibilité trouvée.');
                            $('#num_passport_field').hide();
                        } else {
                            $('#num_passport_field').show();
                            var minDate = new Date(data[0].date_disponible_debut.replace(
                                /(\d{2})\/(\d{2})\/(\d{4})/, '$3-$2-$1'));
                            var maxDate = new Date(data[0].date_disponible_fin.replace(
                                /(\d{2})\/(\d{2})\/(\d{4})/, '$3-$2-$1'));
                            // Définir les valeurs min et max du champ date
                            $('#date_rdv').attr('min', minDate.toISOString().split('T')[0]);
                            $('#date_rdv').attr('max', maxDate.toISOString().split('T')[0]);
                        }
                    }
                });
            } else {
                $('#num_passport_field').hide();
            }
        });

        $('#check_rdv_button').on('click', function() {
            var num_passport = $('#num_passport').val();
            var type_visa_id = $('#type_visa').val();
            var pays_id = $('#pays').val();

            $.ajax({
                url: '/check-rdv-exists',
                type: 'GET',
                data: {
                    num_passport: num_passport,
                    type_visa_id: type_visa_id,
                    pays_id: pays_id
                },
                success: function(response) {
                    if (response.exists) {
                        alert(
                            'Un rendez-vous est déjà en cours pour ce numéro de passeport, ce type de visa, ce pays et ce statut.'
                        );
                    } else {
                        $('#check_rdv_button').hide();
                        $.ajax({
                            url: '/get-disponibilites/' + type_visa_id + '/' + pays_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                if (data.length === 0) {
                                    alert('Aucune disponibilité trouvée.');
                                } else {
                                    var disponibilites = data;
                                    var calendrierHtml =
                                        '<h5>Calendrier des disponibilités</h5><ul>';
                                    disponibilites.forEach(function(disponibilite) {
                                        var dateDebut = new Date(disponibilite
                                            .date_disponible_debut);
                                        var dateFin = new Date(disponibilite
                                            .date_disponible_fin);
                                        var dateDebutFormatted = new Intl
                                            .DateTimeFormat('fr-FR', {
                                                day: 'numeric',
                                                month: 'long',
                                                year: 'numeric'
                                            }).format(dateDebut);
                                        var dateFinFormatted = new Intl
                                            .DateTimeFormat('fr-FR', {
                                                day: 'numeric',
                                                month: 'long',
                                                year: 'numeric'
                                            }).format(dateFin);
                                        calendrierHtml += '<li>Du ' +
                                            dateDebutFormatted + ' au ' +
                                            dateFinFormatted + '</li>';
                                    });
                                    calendrierHtml += '</ul>';
                                    calendrierHtml +=
                                        '<button class="btn btn-primary" id="continuer">Continuer</button>';

                                    $('#initial .card-body').append(
                                        calendrierHtml
                                    );
                                }
                            }
                        });
                    }

                }

            });
        });
    </script>
    <script>
        $(document).on('click', '#continuer', function() {
            // Créer le formulaire avec les champs nécessaires
            $('#suite').show();
            $('#soumission').show();
            $('#continuer').hide();
        });
    </script>



@endsection
