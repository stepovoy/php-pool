SELECT COUNT(last_projection) AS movies FROM film
WHERE (last_projection > '2006-10-30' AND last_projection < '2007-07-27')
	OR(last_projection > '2007-07-27' AND release_date < '2007-07-27')
	OR('12-24' BETWEEN DATE_FORMAT(release_date, '%m-%d')
	AND DATE_FORMAT(last_projection, '%m-%d'));