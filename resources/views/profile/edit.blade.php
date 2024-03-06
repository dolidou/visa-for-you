@extends('layout')

@section('content')
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
            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Information Utilisateur</h4>
                
              </div>
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-current-password">Nom Utilisateur</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" input type="text" name="name_user"   value="{{Auth::user()->name}} " readonly />
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-password">Utilisateur</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="texte"  value="{{Auth::user()->email}} " readonly />
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-password">Département</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="texte"    
                      
                        value="{{ Auth::user()->departement->libelle }}"
                    readonly />
                     
                    </div>
                  </div>
                </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Changement du Mot de passe</h4>
                
              </div>
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-3 col-form-label" for="input-current-password">Ancien Mot de Passe</label>
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
                  <label class="col-sm-3 col-form-label" for="input-password">Nouveau Mot de Passe</label>
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
                  <label class="col-sm-3 col-form-label" for="input-password-confirmation">Confirmez le nouveau Mot de Passe</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmer Mot de Passe') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">Valider</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection