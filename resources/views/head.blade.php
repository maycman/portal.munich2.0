<header class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
    <div class="navbar-header">
    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        	<span class="sr-only">Toggle navigation</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
    	<div class="row">
    		<div class="col-sm-1">
    			<img id="volks" class="img-responsive" src="/assets/images/gelogo.png" alt="Image Responsive">
    		</div>
    		<div class="col-sm-10"> 
    			<ul class="nav navbar-nav">	
        			<li id="home"><a href="/">Inicio</a></li>
					<li id="mdrop"><a href="/encuestas">Call Center</a></li>
        			<li><a href="#">Ventas</a></li>
                    <li id="servicioDrop" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li id="4semanas"><a href="/4semanas">4 Semanas</a></li>
                            <li><a href="#">Correcciones</a></li>
                            <li><a href="#">Otros</a></li>
                        </ul>
                    </li>
        		</ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <!--li><a href="{{ route('register') }}">Register</a></li-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
        	</div>
        </div>
    </nav>
</header>