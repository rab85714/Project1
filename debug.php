    <?php
        print "hi" . "<br>";
        if(isset($_Post['submit'])) {
            print "in for loop" . "<br>";
            if(document.getElementById(1).checked) {
                alert('1');
            }
            else if(document.getElementById(2).checked) {
                alert('2');
            }
        }
    ?>