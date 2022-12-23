<div class="card">
  <div class="card-header">
    Daftar Artikel
  </div>

  <div class="card-body">
    <div class="alert alert-warning mb-0 mx-3" role="alert"><b>Berhasil: </b> Artikel dengan id 23 telah dihapus!</div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item p-3">
        <a href="{{ url('/articles/'.rand()) }}" class="text-decoration-none h5 text-primary">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a>  
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem eum nemo facilis ipsam repudiandae, illum ratione cum alias totam autem mollitia nam dicta amet repellat! Repellat fugiat deserunt eos nostrum!</p>
        <small class="text-muted">- asdasd | {{ date('Y-m-d H:i:s') }}</small>
      </li>
    </ul>
  </div>
</div>
