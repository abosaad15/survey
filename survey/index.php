<?php
    include_once 'includes/dbh.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title></title>
</head>
<body>


<?php
    $email = NULL;
    $l1q1 = NULL;
    $l1q2 = NULL;
    $l1q3 = NULL;
    $l1q4 = NULL;
    $l2q1 = NULL;
    $l2q2 = NULL;
    $l2q3 = NULL;
    $l2q4 = NULL;
    $l2q5 = NULL;
    $l3q1 = NULL;
    $l3q2 = NULL;

    function validatePOST() {
        global $email, $l1q1, $l1q2, $l1q3, $l1q4, $l2q1, $l2q2, $l2q3, $l2q4, $l2q5, $l3q1, $l3q2;
        $end = false;

        if (empty($_POST['email'])) {
            return false;
        } else {
            $email = $_POST['email'];
        }

        // Validation - Q1
        if (empty($_POST['q1'])) {
            $q1Err = 'Required';
            return false;
        } else {
            $l1q1 = $_POST['q1'];
            if ($_POST['q1'] == 'no') {
                if (empty($_POST['q1-sub-1'])) {
                    return false;
                } else {
                    $l2q1 = $_POST['q1-sub-1'];
                    if ($_POST['q1-sub-1'] == 'No Usage') {
                        $end = true;
                        if (empty($_POST['q1-end-comment'])) {
                            return false;
                        }
                    }
                }
            }
        }

        if ($end == false) {

            // Validation - Q2
            if (empty($_POST['q2-from-city']) || empty($_POST['q2-from-district']) ||
                empty($_POST['q2-to-city']) || empty($_POST['q2-to-district'])) {
                $q2Err = 'Required';
                return false;
            } else {
                $l1q2 = $_POST['q2-from-city'] . ',' . $_POST['q2-from-district'] . ' : ' . $_POST['q2-to-city'] . ',' . $_POST['q2-to-district'];
            }

            // Validation - Q3
            if (empty($_POST['q3']) || $_POST['q3'] == 'Choose') {
                $q3Err = 'Required';
            } else {
                $l1q3 = $_POST['q3'];
                if ($_POST['q3'] == "Im not aware that I can take it" && empty($_POST['q3-sub-1'])) {
                    $q3Err = 'Required';
                    $q3Sub1 = 'Required';
                    return false;
                } else if ($_POST['q3'] == "Im not aware that I can take it" && !empty($_POST['q3-sub-1'])) {
                    $l2q2 = $_POST['q3-sub-1'];
                } else if ($_POST['q3'] == "No cabinet Available in the New Area" && empty($_POST['q3-sub-2'])) {
                    $q3Err = 'Required';
                    return false;
                } else if ($_POST['q3'] == "No cabinet Available in the New Area" && !empty($_POST['q3-sub-2'])) {
                    $l2q3 = $_POST['q3-sub-2'];
                    if ($_POST['q3-sub-2'] == 'no' && empty($_POST['q3-sub-2-sub-1'])) {
                        $q3Err = 'Required';
                        return false;
                    }
                    $l3q1 = $_POST['q3-sub-2-sub-1'];
                } else if ($_POST['q3'] == "ive got a replacement" && empty($_POST['q3-sub-3'])) {
                    $q3Err = 'Required';
                    return false;
                } else if ($_POST['q3'] == "ive got a replacement" && !empty($_POST['q3-sub-3'])) {
                    $l2q4 = $_POST['q3-sub-3'];
                    if ($_POST['q3-sub-3'] == 'stc' && empty($_POST['q3-sub-3-sub-1'])) {
                        $q3Err = 'Required';
                        return false;
                    }
                    $l3q2 = $_POST['q3-sub-3-sub-1'];
                } else if ($_POST['q3'] == "Other" && empty($_POST['q3-comment'])) {
                    return false;
                }
            }

            // Validation - Q4
            if (empty($_POST['q4'])) {
                $q4Err = 'Required';
                return false;
            } else if (!empty($_POST['q4'] && $_POST['q4'] == 'yes')) {
                $l1q4 = $_POST['q4'];
                if (empty($_POST['q4-sub-1'])) {
                    return false;
                }
                $l2q5 = $_POST['q4-sub-1'];
            } else {
                $l1q4 = $_POST['q4'];
            }
        }

        // echo ')))))))))';

        // $sql = "INSERT INTO surveyReponses (email, L1Q1, L1Q2, L1Q3, L1Q4) VALUES ('john@example.com', $l1q1, $l1q2, $l1q3, $l1q4)";

        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        //   }

        // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        // VALUES ('John', 'Doe', 'john@example.com')";

        // if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        // } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        return true;
    }
    ?>

    <style>
        .btns {
            display: flex;
            justify-content: space-between;
        }

        .q1-sub-1, .q3-sub-1, .q3-sub-2, .q3-sub-3, .q3-sub-2-sub-1, .q3-sub-3-sub-1, .q4-sub-1, .q1-end-comment, .q3-comment {
            display: none;
        } 

    </style>
    <nav class="">
        <div class="logo">
            <img src="https://www.ccc.net.sa/images/en/logo.png" alt="">
        </div>
        <div class="logout">
            <i class="fas fa-sign-out-alt"></i>
        </div>
    </nav>

    <div class="container">
        <div class="row center">
            <div class="col-12 text-center form-title">
                <p>Survey</p>
            </div>
            <div class="col-sm-12 col-md-6 mx-auto border p-3 form-container">
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (validatePOST() == false) {
                        echo '<div class="alert alert-danger" role="alert">Please fill all required fields !</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">Thank you, we have recieved you response</div>';

                        $sql = "INSERT INTO surveyReponses (email, L1Q1, L1Q2, L1Q3, L1Q4, L2Q1, L2Q2, L2Q3, L2Q4, L2Q5, L3Q1, L3Q2) VALUES ('$email', '$l1q1', '$l1q2', '$l1q3', '$l1q4', '$l2q1', '$l2q2', '$l2q3', '$l2q4', '$l2q5', '$l3q1', '$l3q2')";

                        $conn->query($sql);

                        // if ($conn->query($sql) === TRUE) {
                        //     echo "New record created successfully";
                        //   } else {
                        //     echo "Error: " . $sql . "<br>" . $conn->error;
                        //   }
                    }
                }
            ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="post" data-parsley-validate>
                    <div class="q1">
                        <span class="error">* <?php echo $q1Err;?></span>
                        <p class="">Q1 - Did you put a cancelation request because you have a MOP?</p>
                        <div class="form-check">
                            <input class="form-check-input q1-yes" type="radio" name="q1" value="yes" required>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input q1-sub-1-branch" type="radio" name="q1" value="no" required>
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                        <hr>
                    </div>
                    <div class="q1-sub-1">
                        <p class="">what is the main reason to disconnect the line ?</p>
                        <select class="form-control q1-sub-1-select" name="q1-sub-1" data-parsley-excluded="true" required>
                            <option selected disabled>Choose</option>
                            <option value="Frequent Technical issues">Frequent Technical issues</option>
                            <option value="Better offer from Competitor">Better offer from Competitor</option>
                            <option value="No Usage" class="q1-end">No Usage</option>
                          </select>
                          <div class="form-group mt-2 q1-end-comment">
                              <input type="text" class="form-control" placeholder="comment to end survey" name="q1-end-comment" data-parsley-excluded="true" >
                          </div>
                          <hr>
                    </div>
                    <div class="q2">
                        <span class="error">* <?php echo $q2Err;?></span>
                        <p class="">Q2 - Which area did you move to? </p>
                          <div class="row">
                              <div class="col-6">
                                <input type="text" class="form-control" placeholder="From City" name="q2-from-city" required>
                              </div>
                              <div class="col-6">
                                <input type="text" class="form-control" placeholder="District" name="q2-from-district" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-6">
                                <input type="text" class="form-control" placeholder="To City" name="q2-to-city" required>
                              </div>
                              <div class="col-6">
                                <input type="text" class="form-control" placeholder="District" name="q2-to-district" required>
                              </div>
                          </div>
                          <hr>
                    </div>
                    <div class="q3">
                        <span class="error">* <?php echo $q3Err;?></span>
                        <p class="">Q3 - why you didn’t take your line with you?</p>
                          <div class="row">
                              <div class="col-sm-12">
                                <select class="form-control q3-select" name="q3" required>
                                    <option selected disabled>Choose</option>
                                    <option class="q3-sub-1-branch" value="Im not aware that I can take it">Im not aware that I can take it</option>
                                    <option class="q3-sub-2-branch" value="No cabinet Available in the New Area">No cabinet Available in the New Area</option>
                                    <option class="q3-sub-3-branch" value="ive got a replacement">ive got a replacement</option>
                                    <option value="STC outlet told me to take a new line">STC outlet told me to take a new line</option>
                                    <option value="STC Call Center informed me to take new line">STC Call Center informed me to take new line</option>
                                    <option value="Other">Other</option>
                                  </select>
                                <div class="form-group mt-2 q3-comment">
                                    <input type="text" class="form-control" placeholder="Other" name="q3-comment" data-parsley-excluded="true" required>
                                </div>
                              </div>
                          </div>
                          <hr>
                    </div>
                    <div class="q3-sub-1">
                        <p class="">when you applied for cancellation were you infomred that you can take your line?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3-sub-1" value="yes" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3-sub-1" value="no" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                        <hr>
                    </div>
                    <div class="q3-sub-2">
                        <p class="">Are you aware about our jood wireless product which gives you internet wihtout cabinet out side your house?</p>
                        <div class="form-check">
                            <input class="form-check-input q3-sub-2-yes" type="radio" name="q3-sub-2" value="yes" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input q3-sub-2-sub-1-branch" type="radio" name="q3-sub-2" value="no" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input q3-sub-2-no-coverage" type="radio" name="q3-sub-2" value="no coverage" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                No Coverage
                            </label>
                        </div>
                        <hr>
                    </div>
                    <div class="q3-sub-2-sub-1">
                        <p class="">would you like to take a jood wireless from STC that offers you excellent internet service without any cabinet? </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3-sub-2-sub-1" value="yes" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3-sub-2-sub-1" value="no" data-parsley-excluded="true" required>
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                        <hr>
                    </div>
                    <div class="q3-sub-3">
                        <p class="">From Which Service Provider did you get another Line?</p>
                          <div class="row">
                              <div class="col-sm-12">
                                <select class="form-control q3-sub-3-select" name="q3-sub-3" data-parsley-excluded="true" required>
                                    <option selected disabled>Choose</option>
                                    <option value="Mobily">Mobily</option>
                                    <option value="zain">Zain</option>
                                    <option value="go">GO</option>
                                    <option class="q3-sub-3-sub-1-branch" value="stc">STC</option>
                                  </select>
                              </div>
                          </div>
                          <hr>
                    </div>
                    <div class="q3-sub-3-sub-1">
                        <p class="">What is the STC Offer /service that you are using?</p>
                          <div class="row">
                              <div class="col-sm-12">
                                <select class="form-control q3-sub-3-sub-1-select" name="q3-sub-3-sub-1" data-parsley-excluded="true" required>
                                    <option selected disabled>Choose</option>
                                    <option value="land line DSL/FTTH">Land line DSL/FTTH</option>
                                    <option value="mobile">Mobile</option>
                                    <option value="router/on the go">Router/on the go </option>
                                  </select>
                              </div>
                          </div>
                          <hr>
                    </div>
                    <div class="q4">
                        <span class="error">* <?php echo $q4Err;?></span>
                        <p class="">Q4 - Would you like to reactivate you earlier line with STC ?</p>
                        <div class="form-check">
                            <input class="form-check-input q4-sub-1-branch" type="radio" name="q4" value="yes" required>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input q4-no" type="radio" name="q4" value="no" required>
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                        <hr>
                    </div>
                    <div class="q4-sub-1">
                        <p class="">What would be the most appropriate time to call you?</p>
                        <input type="date" data-parsley-excluded="true" name="q4-sub-1" required>
                        <hr>
                    </div>
                    <div class="email">
                        <span class="error">*</span>
                        <p class="">Enter you email please</p>
                        <input type="email" name="email" class="form-control" required>
                        <hr>
                    </div>
                    <div class="btns">
                        <button class="btn btn-primary mt-4" name="submit" type="submit">Submit</button>
                    </div>  
                </form>     
            </div>
        </div> 
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/surveyHandler.js"></script>
    <script src="./js/parsley.min.js"></script>
</body>
</html>