<!DOCTYPE html>
<html>
<head>
	<title>Hire a web develope</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
	<?php
		require_once('vendor/autoload.php');

		// use SeoAnalyzer\Analyzer;

		// try {
		//     $results = (new Analyzer())->analyzeUrl('https://weblister.co', 'msn', 'en');
		// } catch (\SeoAnalyzer\HttpClient\Exception\HttpException $e) {
		//     echo "Error loading page: " . $e->getMessage();
		// } catch (ReflectionException $e) {
		//     echo "Error loading metric file: " . $e->getMessage();
		// }
		// ============== FULL ANALYSING ======================
		use SeoAnalyzer\Analyzer;

		try {
		    $results = (new Analyzer())->analyzeUrl('https://weblister.co/blogging', 'weblister');
		} catch (\SeoAnalyzer\HttpClient\Exception\HttpException $e) {
		    echo "Error loading page: " . $e->getMessage();
		} catch (ReflectionException $e) {
		    echo "Error loading metric file: " . $e->getMessage();
		}
		//======== IMAGES ALT CHECKER ============== 
		// use SeoAnalyzer\Analyzer;
		// use SeoAnalyzer\Factor;
		// use SeoAnalyzer\HttpClient\Exception\HttpException;
		// use SeoAnalyzer\Page;
		// use SeoAnalyzer\Parser\ExampleCustomParser;

		// try {
		//     $page = new Page('https://www.osabox.net');
		//     $parser = new ExampleCustomParser();
		//     $page->parser = $parser;
		//     $analyzer = new Analyzer($page);
		//     $analyzer->metrics = $page->setMetrics([Factor::ALTS]);
		//     $results = $analyzer->analyze();
		// } catch (HttpException $e) {
		//     echo "Error loading page: " . $e->getMessage();
		// } catch (ReflectionException $e) {
		//     echo "Error loading metric file: " . $e->getMessage();
		// }

		//============== SSL CHECKER ======================
		// use SeoAnalyzer\Page;
		// use SeoAnalyzer\Factor;
		// use SeoAnalyzer\Analyzer;
		// use SeoAnalyzer\HttpClient\Exception\HttpException;

		// try {
		//     $page = new Page('http://www.msn.com/en-us');
		//     $analyzer = new Analyzer($page);
		//     $analyzer->metrics = $page->setMetrics([Factor::SSL, [Factor::DENSITY_PAGE => 'keywordDensity']]);
		//     $results = $analyzer->analyze();
		// } catch (HttpException $e) {
		//     echo "Error loading page: " . $e->getMessage();
		// } catch (ReflectionException $e) {
		//     echo "Error loading metric file: " . $e->getMessage();
		// }

		// use SeoAnalyzer\Page;
		// use SeoAnalyzer\Factor;
		// use SeoAnalyzer\Analyzer;
		// use SeoAnalyzer\HttpClient\Exception\HttpException;

		// try {
		//     $page = new Page('http://osabox.net', 'pl_PL');
		//     $page->stopWords = ['nie', 'jak', 'msn', 'tak', 'jest', 'kiedy', 'tym'];
		//     $analyzer = new Analyzer($page);
		//     $analyzer->metrics = $page->setMetrics([[Factor::DENSITY_PAGE => 'keywordDensity']]);
		//     $results = $analyzer->analyze();
		// } catch (HttpException $e) {
		//     echo "Error loading page: " . $e->getMessage();
		// } catch (ReflectionException $e) {
		//     echo "Error loading metric file: " . $e->getMessage();
		// }

		// use SeoAnalyzer\Analyzer;
		// use SeoAnalyzer\HttpClient\Exception\HttpException;
		// use SeoAnalyzer\Page;
		// use SeoAnalyzer\Factor;
		// use SeoAnalyzer\Analyzer;
		// use SeoAnalyzer\HttpClient\Exception\HttpException;


		// try {
		//     $results = (new Analyzer())->analyzeUrl('https://osabox.net', '');
		// } catch (HttpException $e) {
		//     echo "Error loading page: " . $e->getMessage();
		// } catch (ReflectionException $e) {
		//     echo "Error loading metric file: " . $e->getMessage();
		// }

		// print_r($results);
		echo "<pre>";
		print_r($results);
		echo "</pre>";
	?>
</body>
</html>