<?php

function potong_teks($teks, $limit = 100)
{
	$teks = strip_tags($teks);

	if (strlen($teks) <= $limit) {
		return $teks;
	}

	$potong = substr($teks, 0, $limit);
	$potong = substr($potong, 0, strrpos($potong, ' '));

	return $potong . '...';
}
