# php '.' vs '.=' benchmark

There was a question, what is faster
```
$array[0] . $array[1] . $array[2] ....
```

or

```
$str .= $array[0];
$str .= $array[1];
$str .= $array[2];
...
```

I generated 2 files with 67584 elements benchmark.

According to 10 checks line_concat is faster:

```
$ for run in {1..10}
> do 
> php line_concat.php
> done
Eval time:0.0013449192047119
Eval time:0.0016348361968994
Eval time:0.0014309883117676
Eval time:0.0014290809631348
Eval time:0.0014259815216064
Eval time:0.0013949871063232
Eval time:0.0014779567718506
Eval time:0.001439094543457
Eval time:0.0013489723205566
Eval time:0.0013720989227295

$ for run in {1..10}
> do 
> php direct_concat.php
> done
Eval time:0.0030579566955566
Eval time:0.0038409233093262
Eval time:0.0031929016113281
Eval time:0.0037569999694824
Eval time:0.0035309791564941
Eval time:0.0031471252441406
Eval time:0.0036740303039551
Eval time:0.0030419826507568
Eval time:0.0034668445587158
Eval time:0.0036599636077881

$ php -v
PHP 7.1.19 (cli) (built: Aug 17 2018 18:03:17) ( NTS )
Copyright (c) 1997-2018 The PHP Group
```
