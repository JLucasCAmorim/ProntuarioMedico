<div class="container">
    <div class="row">
        <div class="col s12 z-depth-4 card-panel" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/registrar">
                         <div class="row">
                         <div class="form-group">

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>

                                    <input id="nome" type="text" name="nome" value = "<?php echo $dados['nome'] ?>"  autofocus>
                                    <label for="nome">Nome</label>


                                    <span class="red-text"><?php echo $nome_error ?></span>


                                </div>
                            </div>
                            <div class="form-group">

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">contact_mail</i>

                                    <input id="email" type="email" name="email" value = "<?php echo $dados['email'] ?>" >
                                    <label for="email">Email</label>


                                    <span class="red-text"><?php echo $email_error ?></span>


                                </div>
                            </div>

                            <div class="form-group">


                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" type="password" value = "<?php echo $dados['password'] ?>" name="password" >
                                    <label for="password">Senha</label>


                                    <span class="red-text"><?php echo $password_error ?></span>


                                </div>
                            </div>
                            <div class="form-group">


                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="confirmar" type="password" value = "<?php echo $dados['confirmar'] ?>" name="confirmar" >
                                    <label for="confirmar">Confirmar senha</label>

                                    <span class="red-text"><?php echo $confirmar_error ?></span>
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_box</i>
                                    <select name="role"  id="role">
                                        <option value="" selected disabled>Selecione</option>

                                        <option value="Medico">Médico</option>
                                        <option value="Admin">Admin</option>

                                        <option value="medico">Médico</option>
                                        <option value="admin">Admin</option>

                                    </select>
                                    <label for="role">Permissão</label>


                                    <span class="red-text"><?php echo $role_error ?></span>


                                </div>
                            </div>
                            <div class="section"></div>

                            <div class="row">
                                <button type="submit" class="col s12 btn btn-large waves-effect #c62828 red darken-3">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>