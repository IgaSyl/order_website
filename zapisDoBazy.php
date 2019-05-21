
//-----------------------------       ZAPIS DO BAZY ---------------------------------
        

        //--------------POŁĄCZENIE Z BAZĄ-------------
        //jeśli nadesłany formularz POSTem - zostanie nawiązane połaczenie z db
        
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
                $connect_to_db = new PDO('mysql:host=localhost; dbname=formularz; charset=utf8', 'root', 'admin');
                $connect_to_db -> exec("SET NAMES 'utf8'");
                $connect_to_db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //setAttribute -> błędy w zapytaniach raportowane jako wyjątki.
        //Operator wywołania `` -> uruchamia zew programy lub polecenia powłoki       
        // prepare() robie szkielet zapytania
        $new_orderValues = 'INSERT INTO `formularz` (`webType`, `attachedFileName`, `colorPicker`, `colorDescription`, `webHeader`, `contact`, `aboutCompany`, `additionalMenuEl`, `rodo`, `googleMapKey`, `created`) VALUES(
            
            :webType,
            :attachedFileName,
            :colorPicker,
            :colorDescription,
            :webHeader, 
            :contact, 
            :aboutCompany, 
            :additionalMenuEl,
            :rodo,
            :googleMapKey,
            NOW())';
        
        $new_order = $connect_to_db -> prepare($new_orderValues);
        
        $new_order -> bindValue(':webType', $webType, PDO::PARAM_STR);
        $new_order -> bindValue(':attachedFileName', $attachedFileName, PDO::PARAM_STR);
        $new_order -> bindValue(':colorPicker', $colorPicker, PDO::PARAM_STR);
        $new_order -> bindValue(':colorDescription', $colorDescription, PDO::PARAM_STR);
        $new_order -> bindValue(':webHeader', $webHeader, PDO::PARAM_STR);
        $new_order -> bindValue(':contact', $contact, PDO::PARAM_STR);
        $new_order -> bindValue(':aboutCompany', $aboutCompany, PDO::PARAM_STR); 
        $new_order -> bindValue(':additionalMenuEl', $additionalMenuEl, PDO::PARAM_STR); 
        $new_order -> bindValue(':rodo', $rodo); 
        $new_order -> bindValue(':googleMapKey', $googleMapKey, PDO::PARAM_STR);
        
        $new_order -> execute();
        $orderNo = $connect_to_db->lastInsertId();
                
                
                echo "<div class= 'container'>";
                echo "<p>Przystępujemy do wdrożenia serwisu internetowego.</p>";
                
                echo "<p>zamówienie nr: $orderNo</p>";
                echo "<p>data zamówienia: <b>$data</b> o godzinie $czas</p>";
                echo "<p style='margin-top: 20px;'>pozdrawiamy,<br>
                Dział Serwisu i Wdrożeń <br>
                Galactica</p>";
                echo "</div>";
                
                }else{
                    echo "proszę uzupełnić formularz i wysłać";
                }
            }
                
            catch(PDOException $e){
                echo "połączenie z bazą nieudane "; 
                exit;  		
                }
        
                /* tą obsługę błędu nie wiem jak napisać s.61 */
        /*
            $new_orderValues1 = 'SELECT id, webType, colorPicker, colorDescription, webHeader, contact, aboutCompany, additionalMenuEl, rodo, googleMapKey, created
                                FROM formularz
                                WHERE id = formularz_id';
                                      // co to????
           try {
               $new_order1 = $connect_to_db -> prepare($new_orderValues1);
               if($new_order1){
                   $new_order1-> execute(array(
                       "formularz_id"=> 1)
                   );
                   $form= $new_order1->fetch();
               }
           }         catch(PDOException $e){
            echo "połączenie z bazą nieudane: " .$e->getMessage(); 
           }
        
           */
        
        
        
            
          //----------------------------------------------------    KONIEC :))))))))))))
        
        
          //^^^^^^^^^^^^^^^^^^  NOTATKI ^^^^^^^^^^^^^^^^
        
          //Nawiązywanie połączenia polega na utworzeniu nowego obiektu klasy PDO, który zapisuję do zmiennej (tu: connect_to_db)-->>
        // jak połączenie z bazą nieudane -> obiekt nie utworzy się i powstanie wyjątek -- > PDOexeption (dlatego połączenie musi być w bloku try-catch); (WAŻNE!!!!!! - jeśli wyjątek nie zostanie przechwycony, domyślny komunikat o błędzie wygenerowany przez PHP ujawni nazwę użytkownika i hasło!)
        
        //DSN - 'data source name', konstruktor, identyfikuje rodzaj serwera DB -> tutaj mysql
        
        // execute() Właściwe wykonanie zapytania -> zwraca true lub false
        
        //metoda exec() umieszcza nowy rekord w bazie
        
        //Zapytania INSERT, UPDATE wysyła się za pomocą metody exec(). Wynikiem jej działania jest liczba określająca ilość zmodyfikowanych rekordów.
        
        //lastInsertID() -> obiekt klasy PDO, przy połączeniu z db zwraca id nowego rekordu w bazie
        //Operator wywołania `` -> uruchamia zew programy lub polecenia powłoki   
        
        /*
        1. prepare(): wysyłam do bazy szkielet zapytania. Zamiast danych robię wstawki, np. :nazwa ->> dostaję obiekt klasy PDOStatement, który biorę do podpięcia danych.
        
        2. bindValue(): podpinam dane z formularza pod konkretne wstawki + określam ich typ: PDO::PARAM_STR określa podpinanie danych tekstowych, PDO::PARAM_INT - liczb całkowitych.
        
        3.execute(): właściwe zapytanie, tutaj dodanie rekordów do bazy
        */
        
        //^^^^^^^^^^^^^^^^^  KONIEC NOTATEK ^^^^^^^^^^^^^^^^^^^^^
          
          
        
        /*
        //---------ZAPIS DO BAZY-------------        
        
        
              $new_order ='INSERT INTO formularz (id, webType, colorPicker, colorDescription, webHeader, contact, aboutCompany, additionalMenuEl, rodo, googleMapKey)
                           VALUES (NULL, :webType, :colorPicker, :colorDescription, :webHeader, :contact, :aboutCompany, :additionalMenuEl, :rodo, :googleMapKey)';
                           //zamiast konkretnych wartości umieszczam w zapytaniu ':atrapy',
              
              $result = $connect_to_db->prepare($new_order);  				// result  jest obiektem klasy PDOStatement
        //----------WYKONANIE ZAPYTANIE------
        
        //metoda exec() umieszcza nowy rekord w bazie
              $result ->execute(array(
                //podpinam pod ':atrapy' zmienne, mogę to z bind zrobić plus kontrola typu, np 
                //$wynik->bindValue( ':nazwa', $_POST['nazwa'], PDO::PARAM_STR );  // :atrapa, $zmienna, typ danej
        
                ':webType' => $webType,
                  ':colorPicker'=> $colorPicker,
                  ':colorDescription'=>$colorDescription,
                  ':webHeader'=>$webHeader, 
                  ':contact'=>$contact, 
                  ':aboutCompany'=>$aboutCompany, 
                  ':additionalMenuEl'=>$additionalMenuEl, 
                  ':rodo'=>$rodo, 
                  ':googleMapKey'=>$googleMapKey
        
        
              ));		           
             echo 'nowe zamówienie dodane do bazy!';
        
              //jak podajesz insertem pola niejawnie (czyli nie nazwami z tabelki???) to id musisz ustawić automatycznie (autoincrement, w edycji wietrsa A.I. zaznaczasz checkboxem, w trybie podstawowym klkas wiecej) 
        */
        
        //+++++++++++++++++++++++++++++++++                  ZAPIS 2             +++++++++++++++++++++++++
        
        /*
        try {
            //jeśli nadesłany formularz metodą POST zostanie nawiązane połaczenie
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                 
                $connect_to_db = new PDO('mysql:host=$host; dbname=$dbname', '$dbUser', '$dbPass');
                $connect_to_db->exec("SET NAMES 'utf8'");
        
                $new_order = $connect_to_db -> exec('INSERT INTO `formularz` (`id`, `webType`, `colorPicker`, `colorDescription`, `webHeader`, `contact`, `aboutCompany`, `additionalMenuEl`, `rodo`, `googleMapKey`)   VALUES(
            \''.$webType.'\',
            \''.$colorPicker.'\',
            \''.$colorDescription.'\',
            \''.$colorDescription.'\',
            \''.$webHeader.'\',
            \''.$contact.'\',
            \''.$aboutCompany.'\',
            \''.$additionalMenuEl.'\',
            \''.$rodo.'\',
            \''.$googleMapKey.'\')');
        
                if($new_order){
                    echo 'Nowe zamówienie zostało wysłane';
                }else{
                    echo 'Wystąpił błąd podczas wysyłanie zamówienia';
                }   
            
            }else{
                echo 'Uzupełnij i wyślij formularz';
            }
        
        }
            catch(PDOException $e){
                echo "nieudane połączenie z bazą danych";   		
                }
        
        */
        
        //++++++++++++++++          KONIEC ZAPISU 2 ++++++++++++++++++++++++++
        
        //**********************    ZAPIS 3                     */
        
        /*
        try {
            //jeśli nadesłany formularz metodą POST zostanie nawiązane połaczenie
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                 
                $connect_to_db = new PDO('mysql:host=$host; dbname=$dbname', '$dbUser', '$dbPass');
                $connect_to_db->exec("SET NAMES 'utf8'");
        
                $new_order = $connect_to_db -> exec('INSERT INTO `formularz` (`id`, `webType`, `colorPicker`, `colorDescription`, `webHeader`, `contact`, `aboutCompany`, `additionalMenuEl`, `rodo`, `googleMapKey`)   VALUES(
            \''.$webType.'\',
            \''.$colorPicker.'\',
            \''.$colorDescription.'\',
            \''.$colorDescription.'\',
            \''.$webHeader.'\',
            \''.$contact.'\',
            \''.$aboutCompany.'\',
            \''.$additionalMenuEl.'\',
            \''.$rodo.'\',
            \''.$googleMapKey.'\')');
        
                if($new_order){
                    echo 'Nowe zamówienie zostało wysłane';
                }else{
                    echo 'Wystąpił błąd podczas wysyłanie zamówienia';
                }   
            
            }else{
                echo 'Uzupełnij i wyślij formularz';
            }
        
        }
            catch(PDOException $e){
                echo "nieudane połączenie z bazą danych";   		
                }
        
                */
        
                //+++++++++++++++++++++++++            KONIEC ZAPISU 3             +++++++++++++++++++++++++++++++++++++++++++++++++
             
        
        
             
        
        // -----------------------------------------------  KONIEC ZAPISU DO BANYCH
        
        