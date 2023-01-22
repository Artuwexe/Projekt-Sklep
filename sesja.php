<?php
  function poczatek_sesji()
  {
    @session_start();
    if (!isset($_SESSION['koszyk']))
    {
      $_SESSION['koszyk']=array('ksiazki'=>array(),'akcesoria'=>array());
    }
  }

  function do_koszyka($ksiazki)
  {
    if (!isset($_POST['do_koszyka'])) return;
    if (count($_POST['towary'])===0) return;
    $towary=$_POST['towary'];
    foreach($towary as $towar)
    {
      $id=(int)(substr($towar,0,6));
      $klucz_cena='cena'.$id;
      $klucz_ilosc='ile'.$id;
      if ($ksiazki)
      {
        $count=count($_SESSION['koszyk']['ksiazki']);
        $_SESSION['koszyk']['ksiazki'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['ksiazki'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['ksiazki'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
      else
      {
        $count=count($_SESSION['koszyk']['akcesoria']);
        $_SESSION['koszyk']['akcesoria'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['akcesoria'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['akcesoria'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
    }
  }  

  function pusty_koszyk()
  {
    if (!isset($_POST['pusty_koszyk'])) return;
    $_SESSION['koszyk']['ksiazki']=array();
    $_SESSION['koszyk']['akcesoria']=array();
    echo '<br />Koszyk jest pusty!';
  }
  
  function pokaz_koszyk()
  {
    if (!isset($_POST['pokaz_koszyk'])) return;
    $ksiazki=$_SESSION['koszyk']['ksiazki'];
    $akcesoria=$_SESSION['koszyk']['akcesoria'];
    
    echo '<br />';
    if (count($ksiazki)===0 && count($akcesoria)===0)
    {
      echo 'Koszyk jest pusty!';
      return;
    }
    
    $suma=0;
    if (count($ksiazki)>0)
    {
      echo 'Książki:<br />';
      for($k=0;$k<count($ksiazki);$k++)
      {
        $suma+=$ksiazki[$k]['cena']*$ksiazki[$k]['ilosc'];
        echo ($k+1).'. '.$ksiazki[$k]['opis'].', cena: '
            .$ksiazki[$k]['cena'].', ilość: '.$ksiazki[$k]['ilosc'].'<br />'."\n";
      }
    }
    
    if (count($akcesoria)>0)
    {
      echo '<br />Akcesoria:<br />';
      for($k=0;$k<count($akcesoria);$k++)
      {
        $suma+=$akcesoria[$k]['cena']*$akcesoria[$k]['ilosc'];
        echo ($k+1).'. '.$akcesoria[$k]['opis'].
            ', cena: '.$akcesoria[$k]['cena'].', ilość: '.$akcesoria[$k]['ilosc'].'<br />'."\n";
      }
    }
    echo '<br />Wartość towarów w koszyku: '.$suma;    
  }
?>