<?php 
    $users = ['ivan','georgi','misho'];
    print_r($users);

    foreach($users as $user){ ?>
<script>
    let users = [];
    users.push(<?php echo $user; ?>);
    console.log(users);
</script>

<?php } ?>