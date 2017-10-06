  <div class="section"></div>
  
   <center>
<div class="container">
<div class="section"><h4 class="red-text">DoctorPront</h4></div>
   <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; ">
             <div class="panel panel-default">
                 <div class="panel-body">
                      
                     <form class="login-form" method="POST" action="/login">

                         <div class='row'>
                         <div class="form-group">

                             <div class="input-field col s12">
                               <i class="material-icons prefix">account_circle</i>

                                 <input id="email" type="email" name="email"  required autofocus>
                                  <label for="email">Email</label>


                                         <strong class="red-text text-darken-2"></strong>


                             </div>
                         </div>

                         <div class="form-group">


                             <div class="input-field col s12">
                               <i class="material-icons prefix">lock</i>
                                 <input id="password" type="password"  name="password" required>
                                   <label for="password" >Senha</label>


                                         <strong class="red-text text-darken-2"></strong>


                             </div>
                         </div>

                         <div class="form-group">
                             <div class="col-md-6 col-md-offset-4">
                                 <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/  >
                                 <label for="remember">Lembrar-me </label>


                             </div>
                         </div>
                         <div class="section"></div>

                             <div class="row">
                                 <button type="submit" id="login" name="login" class="col s12 btn btn-large waves-effect #ef5350 red lighten-1">
                                     Login
                                 </button>


                             </div>
                         </div>
                     </form>
                   </div>
             </div>
         </div>
     
     </div>
     <a class="pink-text">
     Esqueceu sua senha?
  </a>  
  </div>
  
  </center>
