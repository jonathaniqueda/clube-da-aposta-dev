<div class="col-xs-12 col-sm-3 col-md-2 affix-sidebar">
    <div class="sidebar-nav">

        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Menu</span>
            </div>

            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav" id="sidenav01">
                    <li class="active">
                        <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01"
                           class="collapsed">
                            <h4>
                                Clube da Aposta
                            </h4>
                        </a>
                    </li>

                    <li class="color-nav @if(preg_match('/championship_/i', \Request::route()->getName())) active toogle-collapse @endif">
                        <a href="#" data-toggle="collapse" data-target="#toggle0" data-parent="#sidenav01"
                           class="collapsed">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            Campeonato

                            <span class="caret"></span>
                        </a>

                        <div class="collapse" id="toggle0" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="{{route('championship_index')}}">Visualizar</a></li>
                                <li><a href="{{route('championship_create')}}">Cadastrar</a></li>
                                <li><a href="{{route('championship_rank')}}">Classificação Por Campeonato</a></li>
                            </ul>
                        </div>

                    </li>

                    <li class="color-nav @if(preg_match('/teams_/i', \Request::route()->getName())) active toogle-collapse @endif">
                        <a href="#" data-toggle="collapse" data-target="#toggle1" data-parent="#sidenav01"
                           class="collapsed">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            Times

                            <span class="caret"></span>
                        </a>

                        <div class="collapse" id="toggle1" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="{{route('teams_index')}}">Visualizar</a></li>
                                <li><a href="{{route('teams_create')}}">Cadastrar</a></li>
                                <li><a href="{{route('teams_associated')}}">Associar Campeonato</a></li>
                            </ul>
                        </div>

                    </li>

                    <li class="color-nav @if(preg_match('/matches_/i', \Request::route()->getName())) active toogle-collapse @endif">
                        <a href="#" data-toggle="collapse" data-target="#toggle2" data-parent="#sidenav01"
                           class="collapsed">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Jogos

                            <span class="caret"></span>
                        </a>

                        <div class="collapse" id="toggle2" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="{{route('matches_index')}}">Visualizar</a></li>
                                <li><a href="{{route('matches_create')}}">Cadastrar</a></li>
                            </ul>
                        </div>

                    </li>

                    <li class="color-nav">
                        <a href="{{route('login_logout')}}">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Sair
                        </a>

                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>