<li class="treeview menu-open" style="height: auto;" id="cadastrobasico">
    <a href="#">
        <i class="fa fa-fw fa-archive"></i>
        <span>CADASTRO BÁSICO</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: block;">
        <li class="{{ Request::is('especialidades*') ? 'active' : '' }}">
            <a href="{{ route('especialidades.index') }}"><i class="fa fa-edit"></i><span>Especialidades</span></a>
        </li>
        <li class="{{ Request::is('medicos*') ? 'active' : '' }}">
            <a href="{{ route('medicos.index') }}"><i class="fa fa-edit"></i><span>Médicos</span></a>
        </li>
        <li class="{{ Request::is('pacientes*') ? 'active' : '' }}">
            <a href="{{ route('pacientes.index') }}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
        </li>
        
    </ul>
    <a href="#">
        <i class="fa fa-fw fa-archive"></i>
        <span>AGENDAMENTO</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: block;">
        <li class="{{ Request::is('agendamentos*') ? 'active' : '' }}">
            <a href="{{ route('agendamentos.index') }}"><i class="fa fa-edit"></i><span>Agendamento - Consultas</span></a>
        </li>
    </ul>
</li>








