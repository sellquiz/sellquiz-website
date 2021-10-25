
var sell_examples = [];

sell_examples.push({
    id:'eigs',
    title:'Eigenvalues',
    src:`Eigenvalues

    a in { 1, 2, ..., 5 }
    b in { -8, -7, ..., -2 }
    A := [[a,0],[0,b]]
    ev := { a, b }

Let $ "A" = A $.
Determine all __eigenvalues__ of $ "A" $:
* $ lambda = #ev $
`});


sell_examples.push({
    id:'matop',
    title:'Matrix Operations',
    src:`Matrix Operations

Calculate the following term in the field $GF(2)$.

    a := { 0, 1 }
    A in MM( 1 x 2 | a )
    B in MM( 2 x 2 | a )
    C := (A * B)^T mod 2
    input rows := resizable
    input cols := resizable

* $ (A * B)^T = #C $
_First set the number of rows and columns._
`});

sell_examples.push({
    id:'roots',
    title:'Complex Roots',
    src:`Complex Roots

    a in { 2^2, 3^2, 4^2 }
    roots := { -sqrt(a)*j, sqrt(a)*j }

$ f(z) = z^2 + a $

* Determine both __complex roots__ of $ f(z) $:
$ z = #roots $

_Hint: Enter the result in the form $"a"+bi$_
`});

sell_examples.push({
    id:'java',
    title:'Java Programming',
    src:`Java Programming

    JavaMethod add
        assert 'add(2, 3) == 5'

Write a Java method named __add__ with the following properties
* two integral parameters.
* integral return type.
* add values of both parameters and return the sum.

_Hint: only define the method itself. Do not forget to declare the method as public and static._

$ #add $
`});

sell_examples.push({
    id:'inv',
    title:'Inverse Elements',
    src:`Multiplicative inverse element

    n in { 3, 5, 7 }
    b in { 1, 2, ..., 7 }
    c := b + 1
    b := b mod (n-1) + 1
    c := c mod (n-1) + 1
    i1 := xgcd(b, n, 2) mod n
    i2 := xgcd(c, n, 2) mod n

Determine the __multiplicative inverse elements__ in finite field $GF(n)$:

* $b^(-1) equiv #i1 mod n$
* $c^(-1) equiv #i2 mod n$
`});

sell_examples.push({
    id:'det',
    title:'Determinant',
    src:`Determinant

    a := { -5, -4, ..., 5 }
    A in MM( 3 x 3 | a )
    A[1,1] := 0
    A[1,2] := 0
    d := det(A)

Let $ "A" = A $ be a 3 x 3 matrix.
Calculate the __determinant__ of $ "A" $:

* $ det("A") = #d $
`});
