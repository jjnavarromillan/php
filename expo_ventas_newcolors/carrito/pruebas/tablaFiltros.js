var tabla_datos = function(){
    this.n_cols = new Number(n_cols);
	this.n_rows = new Number(n_rows);	
	
	n_rows=0;
	this.name = new String(name);
	this.arrayCols = new Array(arrayCols);
	this.arrayCols[0]="visible";
	this.arrayColsType = new Array();
	this.arrayColsType[0]="boolean";
	n_cols=1;
	
	this.arrayRows = new Array();
	function addCol(nameCol,typeDataCol){
		this.arrayCols[this.n_cols]=nameCol;
		this.arrayColsType[this.n_cols]=typeDataCol;
		this.n_cols++;	
	}
	function newRow(arrayCols){
		this.arrayRows = new Array();
		for(i=1;i<arrayCols.length;i++){
			arrayRows[arrayRows.length][i]="";
		}
		n_rows++;
	}
	function getNextId(){
		return this.n_rows;	
	}
	function addRowData(arrayRowDatos){
		this.newRow(this.arrayCols);
		var idx=this.getNextId();
		if(arrayRowDatos.length==this.n_cols-1){
			for(i=1;i<this.n_cols;i++){
				arrayRows[idx][i]=arrayRowDatos[i-1];
			}
		}
		else{
			alert("el numero de campos no coincide con los datos a intruducir");
		}
	}
	
	
	
	
}
