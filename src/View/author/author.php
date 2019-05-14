<?php $title = "L'auteur"; ?>
<?php
ob_start();
?>
<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Biographie de l'auteur</h2>

    </div>

</div>

<div class="container">
    <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A cras semper auctor neque vitae tempus quam pellentesque nec. Nulla facilisi nullam vehicula ipsum a arcu cursus. Adipiscing diam donec adipiscing tristique risus nec feugiat. Ultrices tincidunt arcu non sodales neque sodales ut etiam sit. Et malesuada fames ac turpis egestas maecenas. Eget sit amet tellus cras adipiscing enim eu turpis. Elementum eu facilisis sed odio morbi quis commodo odio. Facilisis sed odio morbi quis commodo. Diam volutpat commodo sed egestas. Sed vulputate odio ut enim blandit volutpat. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Laoreet id donec ultrices tincidunt arcu non sodales neque. A lacus vestibulum sed arcu non. Urna cursus eget nunc scelerisque viverra mauris in aliquam sem. Tellus orci ac auctor augue mauris augue neque gravida. Posuere morbi leo urna molestie at elementum eu. Purus in mollis nunc sed. Proin fermentum leo vel orci.</p>

       <p style="text-align: justify">Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Sit amet justo donec enim diam vulputate ut pharetra sit. Ut tortor pretium viverra suspendisse potenti nullam ac tortor. Aenean et tortor at risus viverra adipiscing at in tellus. Duis convallis convallis tellus id interdum velit laoreet. Mollis nunc sed id semper risus. Vitae tempus quam pellentesque nec nam aliquam sem et. At volutpat diam ut venenatis tellus in metus vulputate. Imperdiet sed euismod nisi porta lorem mollis aliquam. Enim tortor at auctor urna. Sit amet consectetur adipiscing elit duis tristique. Dolor sit amet consectetur adipiscing elit ut. In metus vulputate eu scelerisque felis imperdiet.</p>

</div>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>
