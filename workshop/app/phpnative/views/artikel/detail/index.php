<?php 
  require_once('../../templates/header.php');
?>

<div class="card">
  <div class="card-header">
    Detail Artikel : <?= $_GET['id'] ?>
  </div>
  <div class="card-body">
    <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, neque.</h3>
    <small class="text-muted d-block mb-3">- byruddy | <?= date('l, d F Y - H:i:s') ?></small>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex autem nam deserunt corporis ducimus sequi? Voluptate, temporibus! Omnis nesciunt perferendis quasi facilis. Iste, cumque? Nobis alias magni harum eligendi, maiores qui dignissimos dolorem cupiditate officia nulla, assumenda vel ullam. Architecto dignissimos ipsam officia temporibus, deleniti ipsa. Quis magnam nemo fugiat quos! Mollitia omnis obcaecati commodi a rerum! Nostrum dicta accusamus veritatis quod ipsa minus rerum incidunt, tempora nam consequatur quis possimus quibusdam laudantium perspiciatis iste sapiente corrupti reprehenderit quisquam libero nisi aliquid. Odio perferendis, possimus, voluptas ad at mollitia aspernatur voluptatem minima quaerat saepe neque alias corrupti rem cum aliquam?</p>
    <hr>
    <div class="text-end">
      <a href="<?= BASE_URL.'views/artikel/ubah/?id=238' ?>" class="btn btn-warning">Ubah</a>
      <a href="#" class="btn btn-danger">Hapus</a>
    </div>
  </div>
</div>

<?php 
  require_once('../../templates/footer.php');
?>