# math-percentage
This library allows you to evaluate mathematical expressions as strings. You could define a formula for percentage calculation (e.g., "(part / whole) * 100") and use StringCalc to evaluate it with your values for part and whole

## Usage
```
require_once '/path/to/MathCalculator.php';
$numbers = [10, 20, 30, 40, 50];
$result = MathCalculator::calculate(MathCalculator::AVERAGE, $numbers)->toString();
echo $result;
```

## Contributing
Contributions are welcome! Please read our Contribution Guidelines for more information.

## License
This project is licensed under the APACHE 3 License.