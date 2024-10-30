@extends('layout')

@section('content')
<style>
   .bg-custom {
            /* background: linear-gradient(135deg, #000000, #737373); */
            /* background-color: #a73f7d; */
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
        }
        label {
            color: white; /* Couleur du texte en blanc */
        }
        .btn-submit {
                        background-color: #a73f7d;

        }
</style>
  <div class="content">
    <div class="container-fluid">
  
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
        
          @if (session('status_password'))
          <div class="row">
            <div class="col-sm-12">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="material-icons">close</i>
                </button>
                <span>{{ session('status_password') }}</span>
              </div>
            </div>
          </div>
        @endif
            <div class="card bg-custom">
              <div class="card-header bg-custom">
                <h4 class="card-title text-white">Information Utilisateur</h4>
                
              </div>
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-current-password"></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" input type="text" name="name_user"   value="{{Auth::user()->name}} " readonly />
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-password"></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="texte"  value="{{Auth::user()->email}} " readonly />
                     
                    </div>
                  </div>
                </div>
               
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card bg-custom">
              <div class="card-header bg-custom">
                <h4 class="card-title text-white">Changement du Mot de passe</h4>
                
              </div>
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-current-password"></label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Ancien Mot de Passe') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text" for="input-password"></label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nouveau Mot de Passe') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-password-confirmation"></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmer Mot de Passe') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class=" ml-auto mr-auto">
                <button type="submit" class="btn bg-custom1 text-white">Valider</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection