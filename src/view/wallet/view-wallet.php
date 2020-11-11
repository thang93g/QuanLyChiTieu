<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-link" href="index.php">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
        <a class="nav-link disabled" href="#"><h3>My Wallets</h3></a>
        <a class="nav-link disabled"><?php for ($i = 0; $i < 150; $i++) {
                echo '&nbsp';
            } ?></a>
        <span><a style="color: white" class="btn btn-success my-2 my-sm-0" data-toggle="modal"
                 data-target="#exampleModal">
            ADD WALLET
        </a></span>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a wallet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?page=add-wallet" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Category
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="category">
                                    <?php foreach ($categories as $key => $category): ?>
                                        <option><?php echo $category['wallet_category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Wallet name&nbsp&nbsp</span>
                                </div>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Currency
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="currency">
                                    <?php foreach ($currencies as $key => $currency): ?>
                                        <option value="<?php echo $currency['currency_name'] ?>"><?php echo $currency['fullname'] ?>
                                            -
                                            <?php echo $currency['currency_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Initial Balance</span>
                                </div>
                                <input type="text" class="form-control" name="balance">
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?page=wallets" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="ADD" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </nav>


    <div id="accordion">
        <?php foreach ($wallets as $key => $wallet): ?>
            <div class="card">
                <div class="card-header" id="heading<?php echo $key ?>">
                    <h5 class="mb-0">
                        <button style="color: black" class="btn btn-link collapsed" data-toggle="collapse"
                                data-target="#collapse<?php echo $key ?>" aria-expanded="false"
                                aria-controls="collapse<?php echo $key ?>">
                            <table>
                                <tr>
                                    <td rowspan="2"><img width="45px" height="45px"
                                                         src="<?php echo $wallet['img_file'] ?>"</td>
                                    <td colspan="2"><?php echo $wallet['wallet_name'] ?></td>
                                </tr>
                                <tr style="font-size: 15px">
                                    <td>+<?php echo $wallet['sign'] ?></td>
                                    <td><?php echo number_format($wallet['balance']) ?></td>
                                </tr>
                            </table>
                        </button>
                    </h5>
                </div>
                <div id="collapse<?php echo $key ?>" class="collapse" aria-labelledby="heading<?php echo $key ?>"
                     data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th colspan="2">Wallet Details</th>
                                <td><a href="#" data-toggle="modal" data-target="#example<?php echo $key ?>"
                                       style="color: red"">DELETE</a></td><!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="example<?php echo $key ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Do you want to delete
                                                    wallet <?php echo $wallet['wallet_name'] ?>?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                You will also delete all of its transactions, budgets, events, bills and
                                                this action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                                    CANCEL
                                                </button>
                                                <a href="index.php?page=delete-wallet&id=<?php echo $wallet['id'] ?>"
                                                   class="btn btn-danger">DELETE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td><a data-toggle="modal" data-target="#exampleModaledit<?php echo $key ?>"
                                       style="color: green" href="#">EDIT</a></td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModaledit<?php echo $key ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Wallet</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="index.php?page=edit-wallet&wallet-id=<?= $wallet['id'] ?>"
                                                      method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Category
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                        </div>
                                                        <select class="custom-select" id="inputGroupSelect01"
                                                                name="newCategory">
                                                            <?php foreach ($categories as $category): ?>
                                                                    <option <?php if ($category['id'] == $wallet['wallet_category']){ echo 'selected';} ?>><?php echo $category['wallet_category_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="">Wallet name&nbsp&nbsp</span>
                                                        </div>
                                                        <input value="<?= $wallet['wallet_name'] ?>" type="text" class="form-control" name="newName">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Currency
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                        </div>
                                                        <select class="custom-select" id="inputGroupSelect01"
                                                                name="newCurrency">
                                                            <?php foreach ($currencies as $key => $currency): ?>
                                                                <option <?php if ($currency['id'] == $wallet['currency_id']){echo 'selected';}?> value="<?php echo $currency['currency_name'] ?>"><?php echo $currency['fullname'] ?>
                                                                    -
                                                                    <?php echo $currency['currency_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">Initial Balance</span>
                                                        </div>
                                                        <input value="<?= $wallet['balance'] ?>" type="text" class="form-control" name="newBalance">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="index.php?page=wallets" class="btn btn-secondary">CANCEL</a>
                                                        <input type="submit" value="SAVE" class="btn btn-success">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <td rowspan="2"><img height="60px" width="60px" src="<?php echo $wallet['img_file'] ?>">
                                </td>
                                <th><?php echo $wallet['wallet_name'] ?></th>
                            </tr>
                            <tr>
                                <td><?php echo $wallet['fullname'] ?></td>
                            </tr>
                            <tr>
                                <th colspan="2"><input type="checkbox">&nbsp&nbsp&nbsp Exclude from Total</th>
                            </tr>
                            <tr>
                                <td colspan="3">Ignore this wallet and its balance in the "Total" mode.</td>
                            </tr>
                            <tr>
                                <th colspan="2"><input type="checkbox">&nbsp&nbsp&nbsp Archived</th>
                            </tr>
                            <tr>
                                <td colspan="3">Freeze this wallet and stop generating bills & recurring transactions.
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="5"><a href="#" style="color:green;">SHARE
                                        WALLET</a></th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="5"><a href="#" style="color:green; ">TRANSFER
                                        MONEY</a></th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="5"><a href="#" style="color:green;"
                                                                               data-toggle="modal"
                                                                               data-target="#exampleModal<?php echo $key ?>">ADJUST
                                        BALANCE</a></th>
                                <div class="modal fade" id="exampleModal<?php echo $key ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Adjust Balance</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="index.php?page=adjust&id=<?php echo $wallet['id'] ?>"
                                                      method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo $wallet['sign'] ?></span>
                                                        </div>
                                                        <input placeholder="<?php echo number_format($wallet['balance']) ?>"
                                                               name="newBalance" type="number" class="form-control"
                                                               aria-label="Amount (to the nearest dollar)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox">&nbsp&nbsp Exclude from report
                                                    </div>
                                                    <div style="font-size: 15px">Ignore this wallet and its balance in
                                                        the "Total" mode.
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    CANCEL
                                                </button>
                                                <input value="DONE" type="submit" class="btn btn-success">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>