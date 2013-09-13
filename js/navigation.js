             function kembali(){
                $.mobile.changePage("#mainmenu", {transition: "slide", reverse: true});
            };
            function inbox(){
                cekLogin()
                $.mobile.changePage("#inbox", {transition: "slide", reverse: false});
                
            };
            function create(){
                cekLogin()
                $.mobile.changePage("#create", {transition: "none", reverse: false});
                
                
            };
            function group(){
                cekLogin()
                $.mobile.changePage("#group", {transition: "none", reverse: false});
            };
            function schedule(){
                cekLogin()
                $.mobile.changePage("#schedule", {transition: "none", reverse: false});
            };
            function twitter(){
                cekLogin()
                $.mobile.changePage("#twitter", {transition: "slide", reverse: false});
            };
            
            function about(){
                cekLogin()
                $.mobile.changePage("#about", {transition: "slide", reverse: false});
            };
            
            function help(){
                cekLogin()
                $.mobile.changePage("#help", {transition: "slide", reverse: false});
            };