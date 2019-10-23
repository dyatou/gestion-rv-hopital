
function validerNom(valeur)
{
	if (valeur=="") 
	{
		alert("Vous devez entrer un numero.");
		document.forms[0].elements[0].focus();
	}
};

// verification donnees saisies au formulaire

// a l i a s v e r s l e module d ’ e x p r e s s i o n s r é g u l i è r es
var regexUtil = myApp . metier.regexUtil ;
/* * @ d e s c r i p t i o n G e s t i o n n a i r e d ’ é v é nement change de l ’ i n p u t d ’ ID ” mainForm_titre
”.
* C e t t e mé t h o d e e f f e c t u e l e f i l t r a g e par e x e p r e s s i o n r é g u l i è r e .
* @method f i l t e r T i t r e
*/
var filterTitre = function( ) 
{
	var titreValue = $( ”#mainForm_titre ” ) . val( ) ;
	// E x p r e s s i o n s du l a n g a g e c o u r a n t e t c h i f f r e s
	var resultRegexTest = regexUtil . testRegexLatin1WithDigits( { chaine : titreValue , minLength : 1 }) ;
	// M o d i f i c a t i o n du contenu du span d ’ ID ” error_mainForm_titre ”
	if ( resultRegexTest === true ) 
	{
		$( ”#error_mainForm_titre ” ) . empty( ) ;
	} 
	else 
	{
		$( ”#error_mainForm_titre ” ) . html(” Erreur : le titre ne doit contenir que des lettres et chiffres<br />” ) ;
	}
};
/* * @ d e s c r i p t i o n G e s t i o n n a i r e d ’ é v é nement onchange de l ’ i n p u t d ’ ID ”
mainForm_resume ” .
* C e t t e mé t h o d e e f f e c t u e l e f i l t r a g e par e x e p r e s s i o n r é g u l i è r e .
* @ f u n c t i o n f i l t e r Resume
*/
var filterResume = function ( ) 
{
	var titreValue = $( ”#mainForm_resume” ) . val( ) ;
	// E x p r e s s i o n s du l a n g a g e c o u r a n t e t c h i f f r e s e t p o n c t u a t i o n
	var resultRegexTest = regexUtil . testRegexLatin1WithDigitsPunctuation({
	chaine : titreValue ,
	minLength : 1
	}) ;
	// M o d i f i c a t i o n du contenu du span d ’ ID ” error_mainForm_resume ”
	if (resultRegexTest === true ) 
	{
		$(”#error_mainForm_resume”) . empty( );
	}
	else 
	{
		$( ”#error_mainForm_resume”) . html(” Erreur : le résumé ne doit contenir que les lettres et chiffres” + ” ou des caractères de ponctuation<br />” ) ;
	}
};