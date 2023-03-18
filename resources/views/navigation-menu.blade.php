 <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

@if(Auth::user()!=null)

        @if(Auth::user()->role->nombre_rol=="superadmin")
                   
                    
                {{--    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>--}}

{{--prueba--}}
  <!-- Settings Dropdown -->
  <div class="pt-4 pb-1 border-t border-gray-200">
  <div class="ml-3 relative">
    <x-jet-dropdown align="left" width="48">
        <x-slot name="trigger">
            
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                        {{ __('Peritaje') }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            
        </x-slot>

        <x-slot name="content">
            <!-- Peritaje Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Administrar peritaje') }}
            </div>

            <x-jet-dropdown-link href="{{ route('dashboard') }}">
                {{ __('Peritaje') }}
            </x-jet-dropdown-link>

             

            <div class="border-t border-gray-100"></div>

            <x-jet-dropdown-link href="{{ route('superadmin.index') }}" :active="request()->routeIs('superadmin.index')">
                {{ __('Crear usuario') }}
            </x-jet-dropdown-link>

                <x-jet-dropdown-link href="{{ route('vehiculos.index') }}">
                    {{ __('Consultar Peritaje') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('activar.index') }}">
                    {{ __('Activar Peritaje') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('equipopart.index') }}">
                    {{ __('EQUIPOS UTILIZADOS') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('swpart.index') }}">
                    {{ __('SOFTWARE UTILIZADOS') }}
                </x-jet-dropdown-link>
                
            
            
             
        </x-slot>


        




    </x-jet-dropdown>
</div>
                </div>{{--fin de prueba--}}

                {{--prueba--}}
  <!-- Settings Dropdown -->
  <div class="pt-4 pb-1 border-t border-gray-200">
    <div class="ml-3 relative">
      <x-jet-dropdown align="left" width="48">
          <x-slot name="trigger">
              
                  <span class="inline-flex rounded-md">
                      <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                          {{ __('Targeta') }}
  
                          <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                          </svg>
                      </button>
                  </span>
              
          </x-slot>
  
          <x-slot name="content">
              <!-- Account Management -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                  {{ __('Administrar Targeta') }}
              </div>
  
              <x-jet-dropdown-link href="{{ route('marca.index') }}">
                  {{ __('marca') }}
              </x-jet-dropdown-link>
  
               
  
              <div class="border-t border-gray-100"></div>
  
              
  
                  <x-jet-dropdown-link href="{{ route('linea.index') }}">
                      {{ __('Línea') }}
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('combustible.index') }}">
                      {{ __('Combustible') }}
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('carroceria.index') }}">
                      {{ __('Carroceria') }}
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('color.index') }}">
                      {{ __('color') }}
                  </x-jet-dropdown-link>
                  
                 
              
               
          </x-slot>
  
  
          
  
  
  
  
      </x-jet-dropdown>
  </div>
                  </div>
  {{--fin de prueba--}}
             

                    {{--prueba--}}
  <!-- Settings Dropdown -->
  <div class="pt-4 pb-1 border-t border-gray-200">
  <div class="ml-3 relative">
    <x-jet-dropdown align="left" width="48">
        <x-slot name="trigger">
            
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                        {{ __('Vehiculo') }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Administrar vehiculo') }}
            </div>

            
            <div class="border-t border-gray-100"></div>

            

                
                <x-jet-dropdown-link href="{{ route('fotopart.index') }}">
                    {{ __('fotos') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('chasispart.index') }}">
                    {{ __('chasis') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('estructurapart.index') }}">
                    {{ __('estructura') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('latoneriapart.index') }}">
                    {{ __('latoneria') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('vidriopart.index') }}">
                    {{ __('vidrios') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('interiorpart.index') }}">
                    {{ __('interior') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('llantapart.index') }}">
                    {{ __('Llantas') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('luzpart.index') }}">
                    {{ __('Luces') }}
                </x-jet-dropdown-link>
            
            
             
        </x-slot>


        




    </x-jet-dropdown>
</div>
                </div>
{{--fin de prueba--}}

{{--prueva--}}
  <!-- Settings Dropdown -->
  <div class="pt-4 pb-1 border-t border-gray-200">
  <div class="ml-3 relative">
    <x-jet-dropdown align="left" width="48">
        <x-slot name="trigger">
            
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                        {{ __('Partes') }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Administrar Partes') }}
            </div>

            <x-jet-dropdown-link href="{{ route('electricalpart.index') }}">
                {{ __('Piezas Electricas') }}
            </x-jet-dropdown-link>

             

            <div class="border-t border-gray-100"></div>

            

                <x-jet-dropdown-link href="{{ route('motorpark.index') }}">
                    {{ __('Piezas del Motor') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('exteriorpart.index') }}">
                    {{ __('Piezas exteriores') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('fluidopart.index') }}">
                    {{ __('Piezas con fluidos') }}
                </x-jet-dropdown-link>
              
                <x-jet-dropdown-link href="{{ route('suspensionpart.index') }}">
                    {{ __('Piezas de la suspensión') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('compresionpart.index') }}">
                    {{ __('Pieza de compresión motor') }}
                </x-jet-dropdown-link>
               
                <x-jet-dropdown-link href="{{ route('frenopart.index') }}">
                    {{ __('Frenos') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('bajapart.index') }}">
                    {{ __('Parte Baja') }}
                </x-jet-dropdown-link>
                
            
             
        </x-slot>


        




    </x-jet-dropdown>
</div>
  </div>

{{--fin de prueba--}}

                     
                  
                      {{--estos elementos ya estan en el selec
                    <x-jet-nav-link href="{{ route('vehiculos.index') }}" :active="request()->routeIs('vehiculos.index')">
                        {{ __('vehiculo') }}
                    </x-jet-nav-link>

                  
                    <x-jet-nav-link href="{{ route('marca.index') }}" :active="request()->routeIs('marca.index')">
                        {{ __('Marca') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('linea.index') }}" :active="request()->routeIs('linea.index')">
                        {{ __('Linea') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('combustible.index') }}" :active="request()->routeIs('combustible.index')">
                        {{ __('Combustible') }}
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link href="{{ route('carroceria.index') }}" :active="request()->routeIs('carroceria.index')">
                        {{ __('Carroceria') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('color.index') }}" :active="request()->routeIs('color.index')">
                        {{ __('Color') }}
                    </x-jet-nav-link>
                    estos elementos ya estan en el selec--}}
                    @else 
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('vehiculos.index') }}" :active="request()->routeIs('vehiculos.index')">
                        {{ __('vehiculo') }}
                    </x-jet-nav-link>
                    @endif
                @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}
                                      

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

  




                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                             
                        </x-slot>


                        




                    </x-jet-dropdown>
                </div>





            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
