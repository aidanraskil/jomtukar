<div class="card mb-4">
	<div class="card-header">Tetapan</div>
	<div class="list-group list-group-flush">
		<a href="{{ route('profile.edit') }}" class="list-group-item {{ Request::is('tetapan/profil*') ? 'active' : '' }}">Profil</a>
		<a href="{{ route('account.edit') }}" class="list-group-item {{ Request::is('tetapan/akaun') ? 'active' : '' }}">Akaun</a>
	</div>
</div>
