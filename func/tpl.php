<?php

/**
 * Apstrādā šablonu.
 * Sākumā atveram šablona failu $tpl_file, tad ar str_replace
 * aizvietojam iezīmes, kurām atbilst masīva $tags indeksi,
 * ar vērtībām – masīva $tags vērtībām.
 * 
 * @param array $tags asociatīvs masīvs
 * @param string $tpl_src ceļš līdz šablona failam
 * @return string
 */
function render($tags, $tpl_src) {
	$rendered_str = '';

	if (file_exists($tpl_src))
		$tpl = file_get_contents($tpl_src);
	else
		$tpl = $tpl_src;

	// apstrādājam $tags masīvu tā, lai katrs indekss izskatās kā
	// {indekss}
	$tags_keys = array_keys($tags);

	// atsauce &$key ir nepieciešama, lai strādātu pa taisno ar
	// masīva elementu
	foreach ($tags_keys as &$key) {
		$key = '{' . $key . '}';
	}

	$rendered_str = str_replace(
			$tags_keys, $tags, $tpl
	);

	return $rendered_str;
}

function render_struct($block, $tags, $tpl_file) {
	$rendered_str = '';
	
	if (file_exists($tpl_file))
		$tpl = file_get_contents($tpl_file);
	else
		$tpl = $tpl_file;

	// Ar RegExp sameklējam bloka saturu – iekavās
	$regexp = "/\{$block\}\s*(.+)\s*\{\/$block\}/";
	preg_match($regexp, $tpl, $found);

	//print_r($found);
	// $found[1] – ir mūsu <li>…</li>
	// mēģinām aizvietot {value} ar masīva $tags pirmo elementu
	//$rendered_str = str_replace('{value}', $tags[0], $found[1]);
	// mēģinām aizvietot ar visu masīvu $tags
	foreach ($tags as $tag) {
		//$rendered_str .= str_replace('{value}', $tag, $found[1]);
		// ar šo nepietiek, gadījumā ja mums ir citāda
		// bloka struktūra un vairākas iezīmes iekšā
		
		// apstrādājam ar mūsu funkciju render() katru <li>…</li>
		$rendered_str .= render($tag, $found[1]);
	}
	
	// ieliekam rezultātu iekš {list}…{/list}
	$rendered_str = str_replace($found[0], $rendered_str, $tpl);

	return $rendered_str;
}
