<?php
$title = "Home | Products";
$header_title = 'Products';
require_once "./components/header.php";

$sql = "SELECT * FROM products WHERE deleted_at IS NULL ORDER BY created_at DESC";
$result = $link->query($sql);
$products = [];
if ( $result->num_rows ) {
    while($res = $result->fetch_object())
        array_push($products, $res);
}

?>
    <main>
        <?php include_once "./components/page_header.php"; ?>
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <?php
                                if ( count($products) ) {
                                    foreach($products as $product) { ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-popular-items mb-50 text-center">
                                                <div class="popular-img">
                                                    <?php if ( isset($product->image_path) && !empty($product->image_path) ) { ?>
                                                        <img src="./uploads/products/<?php echo $product->image_path ?>" alt="<?php echo $product->name ?>">
                                                    <?php } else if ( isset($product->formula) && !empty($product->formula) ) { ?>
                                                        <h3><?php echo check_string($product->formula) ?></h3>
                                                    <?php } else { ?>
                                                        <h3><?php echo get_inits($product->name) ?> </h3>
                                                    <?php } ?>
                                                </div>
                                                
                                                <div class="popular-caption">
                                                    <h3><?php echo $product->name ?></h3>
                                                    <span><?php echo check_string($product->formula, ' ') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once "./components/shop_method.php"; ?>
    </main>

<?php include_once "./components/footer.php";