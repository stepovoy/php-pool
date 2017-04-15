SELECT upper(last_name) as NAME, first_name, price FROM user_card
JOIN member ON member.id_user_card = user_card.id_user
JOIN subscription ON member.id_sub = subscription.id_sub
WHERE price >= 42
ORDER BY last_name, first_name;
