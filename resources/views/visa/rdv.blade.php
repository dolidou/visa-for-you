<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'RDV')

@section('content')
    <div>
        <div class="container">
            <div class="text-center">
                <h2 class="text-black">Rendez vous de Visa</h2>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
          <div class="card shadow mb-4 col-6 bg-light" id="checking">
        
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Prennez RDV</h6>
            </div>

            <div class="card-body">
                <div class="row" >
                    <div class="col-6">
                        <input type="checkbox" id="visa_normal" name="visa_normal">
                        <label for="visa_normal">RDV Visa Normal</label><br>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" id="visa_electronique" name="visa_electronique">
                        <label for="visa_electronique">RDV Visa Electronique</label><br>
                    </div>
        
                </div>

            </div>
       
          </div>
        </div>
      
    </div>
    <div id="visa_normal_form" style="display: none;">
    <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4" id="initial">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Prise de RDV VISA Normal</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('demanderdv.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pays">Pays</label>
                                <select class="form-control" id="pays" name="pays_id">
                                    <option value="">Sélectionner un pays</option>
                                    @foreach ($paysnormal as $pay)
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
                        <label for="files" style="color:brown"><i class="fas fa-hand-point-down"></i> Importer la copie de la première page de votre passport 
                        </label>

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
    </div>

<div id="visa_electronique_form" style="display: none;">
    <div class="row" >

        <div class="col-6">
            <div class="card shadow mb-4" id="initial">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Prise de RDV VISA Electronique</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('demanderdv.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <select class="form-control" id="pays_electronique" name="pays_id">
                                <option value="">Sélectionner un pays</option>
                                @foreach ($payselectronique as $pay)
                                    <option value="{{ $pay->id }}" data-icon="flag-icon flag-icon-fr">
                                        {{ $pay->libelle }}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group" id="type_electronique" style="display: none;">
                                <label for="type_visa_electronique">Type de Visa</label>
                                <select class="form-control" id="type_visa_electronique" name="type_visa_id">
                                    <option value="">Sélectionner un type de visa</option>
                                </select>
                            </div>
                            <div id="num_passport_field_electronique" style="display:none;">
                                <label for="num_passport_electronique">Numéro de passeport</label>
                                <input type="text" class="form-control" id="num_passport_electronique"
                                    name="num_passport">
                                <br>
                                <button type="button" class="btn btn-primary"
                                    id="check_rdv_button_electronique">suivant</button>
                            </div>
                            <div id="verification_message">

                            </div>


                        </div>
                        <!-- Ajoutez les autres champs du formulaire ici -->

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4" id="suite_electronique" style="display: none">
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
                    <label for="files" style="color:brown"><i class="fas fa-hand-point-down"></i> Importer la copie de la première page de votre passport 
                        <br>
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
            <button type="submit" class="btn btn-primary" id="soumission_electronique"
                style="display: none">Soumettre</button>
        </div>
        <br>

        </form>

    </div>
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
                $('#type_visa').val('').change();
                $('#num_passport').val('');
                $('#verification_message').empty();
                $('#suite').hide();
                $('#soumission').hide();
                $('#check_rdv_button').show();
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
            $('#num_passport_field').show();
            $('#num_passport').val('');
            $('#verification_message').empty();
            $('#suite').hide();
            $('#soumission').hide();
            $('#check_rdv_button').show();
        });

        $('#check_rdv_button').on('click', function() {
            var num_passport = $('#num_passport').val();
            var type_visa_id = $('#type_visa').val();
            var pays_id = $('#pays').val();
            console.log(num_passport);

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
                        $('#suite').show();
                        $('#soumission').show();
                    }

                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pays_electronique').change(function() {
                $('#type_visa_electronique').val('').change();
                $('#num_passport_electronique').val('');
                $('#verification_message').empty();
                $('#suite_electronique').hide();
                $('#soumission_electronique').hide();
                $('#check_rdv_button_electronique').show();
                var paysId = $(this).val();
                console.log(paysId);
                document.getElementById('type_electronique').style.display = "block"
                if (paysId) {
                    $.ajax({
                        url: '/get-visa-types/' + paysId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#type_visa_electronique').empty();
                            $('#type_visa_electronique').append(
                                '<option hidden>Selectionnez le type de visa</option>');
                            $.each(data, function(key, value) {
                                $('#type_visa_electronique').append('<option value="' +
                                    key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#type_visa_electronique').empty();
                }
            });
        });
    </script>
    <script>
        $('#type_visa_electronique').change(function() {
            $('#num_passport_field_electronique').show();
            $('#num_passport_electronique').val('');
            $('#verification_message').empty();
            $('#suite_electronique').hide();
            $('#soumission_electronique').hide();
            $('#check_rdv_button_electronique').show();
        });

        $('#check_rdv_button_electronique').on('click', function() {
            var num_passport = $('#num_passport_electronique').val();
            var type_visa_id = $('#type_visa_electronique').val();
            var pays_id = $('#pays').val();
            console.log(num_passport);

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
                        $('#check_rdv_button_electronique').hide();
                        $('#suite_electronique').show();
                        $('#soumission_electronique').show();
                    }

                }

            });
        });
    </script>
    <script>
        document.getElementById('visa_normal').addEventListener('change', function() {
            var visaNormalForm = document.getElementById('visa_normal_form');
            var visaElectroniqueForm = document.getElementById('visa_electronique_form');
            var checkingForm = document.getElementById('checking');


            if (this.checked) {
                visaNormalForm.style.display = 'block';
                visaElectroniqueForm.style.display = 'none';
                document.getElementById('visa_electronique').checked = false;
                checkingForm.style.display = 'none';
            } else {
                visaNormalForm.style.display = 'none';

            }
        });

        document.getElementById('visa_electronique').addEventListener('change', function() {
            var visaElectroniqueForm = document.getElementById('visa_electronique_form');
            var visaNormalForm = document.getElementById('visa_normal_form');
            var checkingForm = document.getElementById('checking');

            if (this.checked) {
                visaElectroniqueForm.style.display = 'block';
                visaNormalForm.style.display = 'none';
                document.getElementById('visa_normal').checked = false;
                checkingForm.style.display = 'none';

            } else {
                visaElectroniqueForm.style.display = 'none';
            }
        });
    </script>



@endsection
