function validate() {
    
    event.preventDefault();
    
    try {
        var result = true;
        
        var x = document.getElementsByClassName("divq");
        var i;
        for (i = 0; i < x.length; i++) {
            var val = x[i].getElementsByTagName("input")[0].value;
            
            var e = x[i].getElementsByClassName("textfieldRequiredMsg");
            
            var j;
            for (j = 0; j < e.length; j++) {
                if (!(val.length > 0)) {
                    e[j].style.display="inline";
                    result = false;
                } else {
                    e[j].style.display="none";
                }
            }
        }
        
        return result;
        
    } catch (e) {
        throw new Error(e.message);
    }
    return false;

    
    //.textContent
    
    
    /*
    var $email = $('form input[name="email');
    var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
    if ($email.val() == '' || !re.test($email.val()))
    {
        alert('Please enter a valid email address.');
        return false;
    }
    */
}