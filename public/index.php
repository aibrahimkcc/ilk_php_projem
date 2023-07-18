<?php

declare(strict_types = 1);
//dirname:Returns a parent directory's path
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require '../app/App.php';

/* YOUR CODE (Instructions in README.md) */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align:center; " >My first Project</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- YOUR CODE -->
                <?php
                foreach ($array as $ars){
                echo '<tr>';
                    echo '<td>'.date('M j, Y',strtotime($ars[0])).'</td>';
                    echo '<td>'.$ars[1]. '</td>';
                    echo '<td >'.$ars[2].'</td>';
                    if($ars[3][0]!== '-'){
                    echo '<td style=\'color:green\'>'.$ars[3].'</td>';
                } else {
                    echo '<td style=\'color:red\'>'.$ars[3].'</td>';
                }

                echo '</tr>';
                }
                ?>
                
                

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td style='color:green'><?php echo '$'.number_format($kar,2,'.',',');;

                            ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td style='color:red'><?php echo '$'.number_format($zarar,2,'.',',');;  ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?php echo '$'.number_format($kar+$zarar,2,'.',','); ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>